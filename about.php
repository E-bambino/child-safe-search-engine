<?php
include_once 'includes/header.php';

if (isset($_SESSION['justLoggedIn'])) {
  echo $justLoggedInAlert;
  unset($_SESSION['justLoggedIn']);
}
if (isset($_SESSION['passResetSuccess'])) {
  echo $passResetSuccess;
  unset($_SESSION['passResetSuccess']);
}
?>

</html>
   </div>                       
   <!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
}
h1, h2 {
    color: #333;
    text-align: center;
    margin-top: 0;
}
p {
    margin-top: 0;
    margin-bottom: 20px;
}
.section {
    margin-bottom: 40px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.footer {  
    position: fixed;  
    left: 10px;  
    bottom: 5px;  
    right: 10px;   
    width: 95%;  
    background-color: gray;  
    color: white;  
    text-align: center;  
    }
 

  </style>
  <div class="container">
			<h1>About our Website</h1>
			<p>We are here to help provide you with the best ways on how to handle your kids while safely surfing the internet. As children are exposed to more atrocities online, our platform addresses them by conducting activities such as raising awareness so parents can monitor their children's online activities. help show the correct way to do it. Limit access to potentially threatening online sites  </p>
      
      <div class="section">
				<h2>Our Mission</h2>
				<p>Our mission is to protect children from abuse, neglect, and exploitation. We aim to provide resources and support for parents, guardians, caregivers, educators, and anyone who cares about the safety and well-being of children. We strive to create a community that is dedicated to child protection and welfare.</p>
				
		  </div>

			<div class="section">
				<h2>Our Vision</h2>
				<p>Our vision is to create a world where children can grow and thrive in a safe and supportive environment. We envision a society where children are protected from harm and are given the opportunity to reach their full potential. We believe that every child deserves to be safe, healthy, and happy.</p>
				
			</div>

			<div class="section">
				<h2>Our Values</h2>
				<p>We are guided by the following values:</p>
				<ul>
					<li>Child safety and welfare</li>
      <div class="footer">  
      @Copyright childprotectionsystem @2023-All Right Reserved.   
      </div>
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