<?php
require 'vendor/autoload.php';
require 'lib/php/autoload.php';
use Emojione\Client;
use Emojione\Ruleset;

if (!function_exists('dd')) {
  function dd($data, $var_dump = false) {
    echo "<pre>";
    if ($var_dump) {
      var_dump($data);
    } else {
      print_r($data);
    }
    echo "</pre>";
    die;
  }
}

$config = [
  'host'    => 'localhost',
  'driver'  => 'mysql',
  'database'  => 'test',
  'username'  => 'root',
  'password'  => 'root',
  'charset' => 'utf8',
  'collation' => 'utf8mb4',
  'prefix'   => ''
];

$db = new \Buki\Pdox($config);

$emojione = new Client(new Ruleset());

$messages = $db->table('messages')
    ->select('*')
    ->getAll();
