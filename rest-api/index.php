<!DOCTYPE html>
<html>
<head>
 <link rel='stylesheet' href='css/styles.css' />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type='text/javascript' src='js/main.js'></script>
</head>
<body>

<h2>Rest API - Spaceship Management </h2>
    <!-- the input value is to be put to the databasae using REST API -->
  <input type="text" id="feed" name="feed" placeholder="Post your message"><br><br>
  <button id = "submit">Submit</button>

<!-- This element outputs the total messages -->
<div class="row">
  <p id='rec'></p>
  <p id = "reply_txt"></p>
</div>

<!-- This element outputs the replies to the clicked one -->
<p id ='rep'></p>

</body>
</html>