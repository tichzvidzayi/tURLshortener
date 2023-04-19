<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>tURL Shortener</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mycss.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<div class="jumbotron text-center">
  <h1> tURL Shortener</h1> 
 <br> <br>
  <form action = " " method = "post">
    <div class="input-group">
      <input type="text" class="form-control" name ="longurl" size="50" placeholder="Long URL" required>
      <div class="input-group-btn">
        <input type="submit" name="submit" class="btn btn-danger" background-color= #555555 >
      </div>
    </div>
  </form>
  
  <p> 
<?php
$errmsg =" "; $urlfail =false;
if (isset($_POST['submit']))
{
require_once "dbConfig.php" ;
require_once "Shortener.class.php";
$shortener = new Shortener($db);              //creating the PDO object
$longURL = htmlentities($_POST['longurl']);    //assign long url to longURL
$_POST = array();                              // Clear array /reset _POST
$shortURL_Prefix = 'http://localhost/';       // short url prefix
try
{// Generate short code 
    $shortCode = $shortener->urlToShortCode($longURL);
    $shortURL = $shortURL_Prefix.$shortCode;
    echo " You shortened ". $longURL."<br> to:<h1>" .$shortURL ."</h1>";
    $longURL =" "; $shortURL=" ";
    unset($_POST['submit']);
   
}
catch(Exception $e)
 {   
   echo $e->getMessage();
  }
}?> 
 </p>
</div>
<div id="about" class="container-fluid">
  <div >
    <div class="col-sm-8">
      <h1>About tURL Shortener</h1>
      <h4>
      tURL Shortner application uses the LAMP (Linux, Apache, MySQL and PHP) stack technology to shorten long URLs to short URLs. Short URLS are easier to share via emails or post on interactive platforms. 
      </h4>
    </div>

    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
 
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
