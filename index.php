<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Emojies PHP Mysql</title>
   <link rel="stylesheet" href="style.css">
  <link href="lib/css/emojionearea.min.css" rel="stylesheet">
  <style>
    .container {
      padding-top: 20px;
    }
  </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Messages</div>
                <div class="panel-body">
                    <div id="messagesList">
                      <?php foreach($messages as $message):?>
                          <p><?php echo $emojione->shortnameToImage($message->message); ?></p>
                          <hr>
                      <?php endforeach;?>
                    </div>
                </div>
            </div>

            <!-- Form starts -->
            <form action="ajax.php" method="POST" role="form">
              <div class="form-group">
                <input type="text" class="form-control" name="content" id="message" placeholder="Type your message here..." autofocus required>
              </div>
              <button type="submit" id="renderMessage" class="btn btn-primary">Send</button>
            </form>
            <!-- Form ends -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="lib/js/emojione.js"></script>
<script src="lib/js/emojionearea.min.js"></script>
<script>
  $(function() {
    $("#message").emojioneArea();
    $('#renderMessage').click(function(e){
      e.preventDefault();
      var message = $('#message').val();
      message = emojione.toShort(message);
      $.ajax({
        url : 'ajax.php',
        data : {content : message},
        method : 'POST',
        dataType: 'json',
        success : function(response){
          message = emojione.toImage(message);
          html = '<p>' + message +'</p>';
          html += '<hr>';

          $("#messagesList").append(html);
          return $('#message').val('');
        },
        error : function(err){
          console.log(err);
        }
      });
    });
  });
</script>
</body>
</html>
