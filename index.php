<?php
include_once 'includes/header.php';

if (isset($_SESSION['parentId'])) {
  header("location: /profile.php");
}

if (isset($_SESSION['justLoggedIn'])) {
  echo $justLoggedInAlert;
  unset($_SESSION['justLoggedIn']);
}
if (isset($_SESSION['passResetSuccess'])) {
  echo $passResetSuccess;
  unset($_SESSION['passResetSuccess']);
}
?>

<main>
  <h1  class="tr">KIDS! LETS GET SAFE ONLINE</h1>
 
      <div>
                               
                            <marquee behavior="alternate" vspace="5%" direction="right" scrollamount="7" style="margin-top: 0.1px;">
                              <img class="sp" src="img/bully.jpg">
                              <img class="sp" src="img/dsp1.jpg">
                              <img class="sp" src="img/dsp2.png">
                              <img class="sp" src="img/dsp3.jpg">
                              <img class="sp" src="img/dsp4.png">
                              <img class="sp" src="img/dsp5.jpeg">
                              <img class="sp" src="img/dsp8.jpg">
                          
                            </marquee>
                            
                    </div>
   <div>
  
<body>
   
    <section>
    <div class="kontainer">
  <img src="" alt="Avatar">
  <div class="message-box">
    <p class="message">I've got some tips for you below!</p>
  </div>
</div>
<div class="container">
  <article>
    <h2 class="h2">Bullying</h2>
    <p>Bullying is never okay. It's important to tell a trusted adult if you or someone you know is being bullied.</p>
  </article>
  <article>
    <h2 class="h2">Online Safety</h2>
    <p>It's important to be safe when you're online. Never share personal information with strangers and tell a trusted adult if someone makes you feel uncomfortable online.</p>
  </article>
  <article>
    <h2 class="h2">Healthy Habits</h2>
    <p>Lets maintain healthy habbits that you will learn from our avatars below when online!</p>
  </article>
</div>

</html>
   </div>                       
   <!DOCTYPE html>
<html>
<head>
	<title>Three Images with Information Display</title>
	<style>
		.conntainer {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			align-items: center;
			padding: 10px;
		}
		.bbox {
			width: 410px;
			height: 250px;
			margin: 10px;
			border: 1px solid orange;
			text-align: center;
			transition: all 0.3s ease;
      border-radius: 20px;
		}
		.bbox:hover {
			transform: scale(1.1);
			box-shadow: 2px 2px 5px cyan;
		}
		.bbox img {
			max-width: 100%;
			max-height: 100%;
			vertical-align: middle;
		}
		.info {
			display: none;
			padding: 12px;
			background-color: whitesmoke;
			border: 1px cyan;
			text-align: center;
			font-size: 20px;
      border-radius:30;
		}
		.bbox:focus .info {
			display: block;
		}
	</style>
</head>
<body>
	<div class="conntainer">
		<div class="bbox" tabindex="0">
			<img src="img/baha.jpeg" alt="Image 1" style="width:80px;height:80px;border-radius: 50%; margin-right: 20px;">
			<div class=""><a href="bahati.html">Click to learn from Cyber</a>.</div>

		</div>
		<div class="bbox" tabindex="0">
			<img src="img/klein.jpeg" alt="Image 2" style="width:80px;height:80px;border-radius: 50%; margin-right: 20px;">
      <div class=""><a href="klein.html">Click to learn from Tech</a>.</div>

		</div>
		<div class="bbox" tabindex="0">
			<img src="img/meki.jpeg" alt="Image 3" style="width:80px;height:80px;border-radius: 50%; margin-right: 20px;">
      <div class=""><a href="meki.html">Click to learn from Safe</a>.</div>

		</div>
	</div>
</body>
</html>
                      
                               
    </body>
  </h1>
</main>

<?php
include_once 'includes/footer.php';
?>

<script>
  // Hide all alerts initially
  $("#success-alert").hide();
  $("#empty-input-alert").hide();
  $("#wrong-login-alert").hide();

  // Get the URL of the current page
  const url = window.location.href;

  // Check if the URL contains a specific string
  if (url.includes("message=loginsuccess")) {
    // Display the success-alert if the string is found
    $("#success-alert").show();
  }
</script>