<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Emojies PHP Mysql</title>
   <link rel="stylesheet" href="style.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/css/emoji.css" rel="stylesheet">
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
                          <p><?php echo json_decode($message->message); ?></p>
                          <hr>
                      <?php endforeach;?>
                    </div>
                </div>
            </div>

            <!-- Form starts -->
            <form action="ajax.php" method="POST" class="form-inline" role="form">
              <div class="form-group">
                <input type="text" class="form-control" name="content" id="message" placeholder="Type your message here..." data-emojiable="true" autofocus required>
              </div>
              <button type="submit" id="renderMessage" class="btn btn-primary">Send</button>
            </form>
            <!-- Form ends -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="lib/js/config.js"></script>
<script src="lib/js/util.js"></script>
<script src="lib/js/jquery.emojiarea.js"></script>
<script src="lib/js/emoji-picker.js"></script>
<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: 'lib/img/',
      popupButtonClasses: 'fa fa-smile-o'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();

    $('#renderMessage').click(function(e){
      e.preventDefault();
      var message = $('#message').val();
      $.ajax({
        url : 'ajax.php',
        data : {content : message},
        method : 'POST',
        dataType: 'json',
        success : function(response){
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
