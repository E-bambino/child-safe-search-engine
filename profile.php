<?php
include_once 'includes/header.php';
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
    padding: 50px;
}
h1, h2 {
    color: #333;
    text-align: center;
    margin-top: 0;
}
p {  
    font-size: 16px;
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
    left: 30px;  
    bottom: 5px;  
    right: 10px;   
    width: 95%;  
    background-color: gray;  
    color: white;  
    text-align: center;  
    }
 
	</style>
<div class="container">
			<h1>Awareness</h1>
			<p>As a parent, it's important to be aware of the potential risks that your children may face online. The internet is a powerful tool that can be both beneficial and dangerous, especially for young children who may not understand the consequences of their actions online. </p>
    
			<div class="section">
				<h2>Tips of protecting your child</h2>
				<p><ol>
                 <li><b>Teach your children about online safety:</b> Explain to your children what online abuse is, how to recognize it, and what to do if they experience it. Encourage them to talk to you if they feel uncomfortable or threatened online.</li>
				 <li><b>Set rules for internet use:</b> Establish guidelines for when and how your children can use the internet. Consider limiting the amount of time they spend online and what websites they can visit.</li>
				 <li><b>Monitor your children's online activity:</b> Keep an eye on what your children are doing online, and regularly check their internet history and social media accounts. Be aware of any new friends or contacts they make online.</li>
				 <li><b>Use parental controls:</b> Many devices and internet providers offer parental control features that can help limit your children's access to certain websites and apps.</li>
				 <li><b>Encourage open communication:</b> Make sure your children feel comfortable talking to you about their online experiences. Let them know that you are there to support them and will take their concerns seriously.</li>
				</ol></p>
            </div>
            <div>
            <div class="comments"></div>

<script>
const comments_page_id = 1; // This number should be unique on every page
fetch("comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
	document.querySelector(".comments").innerHTML = data;
	document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
		};
	});
	document.querySelectorAll(".comments .write_comment form").forEach(element => {
		element.onsubmit = event => {
			event.preventDefault();
			fetch("comments.php?page_id=" + comments_page_id, {
				method: 'POST',
				body: new FormData(element)
			}).then(response => response.text()).then(data => {
				element.parentElement.innerHTML = data;
			});
		};
	});
});
</script>
            </div>
			
			<div class="footer">  
             @Copyright childprotectionsystem @2023-All Right Reserved.   
            </div>
</main>

<?php
include_once 'includes/footer.php';
?>