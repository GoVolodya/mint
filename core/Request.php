<?php

namespace core;

/**
 * Class Request
 * 
 * @package core
 */
class Request
{
  public function resolve()
  {
    echo 'You chose ' . $_POST['items'] . ' images!';
    echo '<br>';
    echo 'You chose ' . $_POST['workers'] . ' workers!';

    $items = $_POST['items'];
    $workers = [];
    for ($j = 0; $j < $_POST['workers']; $j++) {
      $name = bin2hex(random_bytes(3));
      $speed = rand(1, 10);
      $workers[$name] = $speed;
    }
    echo '<br>';
    for ($i = 0;; $i++) {
      if ($i === 0) {
        $items -= count($workers);
        foreach ($workers as $key => $value) {
          ${$key . '_' . $value} = 0;
        }
        continue;
      }
      foreach ($workers as $key => $value) {
        if ($i % $value === 0) {
          if ($items >= 1) {
            $items -= 1;
            ${$key . '_' . $value} += $value;
          } else {
            false;
          }
        }
      }
      if ($items === 0) {
        $total = 0;
        foreach ($workers as $key => $value) {
          ${$key . '_' . $value} += $value;
          echo $key . ' spent ' . ${$key . '_' . $value} . ' minutes and made ' . ${$key . '_' . $value} / $value . ' images on speed ' . $value . ' images/minute';
          echo '<br>';
          $total += ${$key . '_' . $value};
        }
        echo 'Total time spent ' . $total . ' minutes';
        unset($_POST['items']);
        unset($_POST['workers']);
        echo '<br>';
        echo '<a href="/">Go back</a>';
        exit;
      }
    }
  }
}
