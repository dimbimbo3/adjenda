<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>

<main>
	<div class="container-fluid" style="padding:.5em">
		<p><img src="../images/about.jpg" alt="About Image" width="40%" height="auto"></p>
		<h6>
			Hello Customer,<br><br>
			WELCOME! You have stumbled upon the greatest bakery in the country!<br><br>
			Prepare to have all of your cravings satisfied by our wide assortment of desserts!<br><br>
		</h6>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>