<!--Includes the defined header-->
<?php include '../view/header.php'; ?>

<main>
	<div style="width:94.5%; margin-left:2.5%">
		<h1>Courses</h1>
		<hr border-top: 10px solid black; border-radius: 5px;>

        <!--Course Cards-->
        <div class="card bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">Course Num: 001</div>
            <div class="card-body text-dark">
                <h5 class="card-title" style="padding-bottom:10%">Example Course</h5>
                <form action="dash.php" method="post">
					<input type="hidden" name="action" value="selectCourse">
                    <input type="hidden" name="courseNum" value="001">
				    <button type="submit" class="btn btn-primary">Select</button>
				</form>
            </div>
        </div>

        <h1>Successful login</h1>
        <h3>Account Email: <?php echo $_SESSION["accEmail"]?></h3>
        <h3>Account Type: 
            <?php
                if($_SESSION["accType"] == "S"){
                    echo "Student";
                }
                else if($_SESSION["accType"] == "I"){
                    echo "Instructor";
                }
                else{
                        echo "ERROR! No Account Type.";
                        exit;
                }
            ?>
        </h3>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>