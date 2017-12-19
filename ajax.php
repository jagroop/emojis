<?php
require 'init.php';

$message = trim($_POST['content']);

if($message != "")
{
  //save message to the DB
    
  $db->table('messages')->insert([
    'message' => $message
  ]);

  $reponse = ['content' => $message];
  echo json_encode($reponse);
  die;
}
return null;

