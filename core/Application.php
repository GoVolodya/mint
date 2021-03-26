<?php

namespace core;

require_once 'Request.php';

use core\Request;

/**
 * Class Application
 * 
 * @package core
 */
class Application
{
  public Request $request;

  public function __construct()
  {
    $this->request = new Request();
  }

  public function run()
  {
    if ($_POST['items'] and $_POST['workers']) {
      echo $this->request->resolve();
    } else {
      echo '<form action="" method="post">
    <label for="items">Select number of images</label>
    <select name="items">
    <option>10</option>
    <option>100</option>
    <option>1000</option>
    <option>10001</option>
    </select>
    <label for="workers">Select number of workers (thay will have random names and working speed)</label>
    <select name="workers">
    <option>3</option>
    <option>5</option>
    <option>7</option>
    <option>10</option>
    </select>
    <button type="submit">Submit</button>
    </form>';
    }
  }
}
