<!--Includes the defined header-->
<?php include '../view/header.php'; ?>
<?php require_once('../model/rosterFunctions.php'); ?>

<main>
	<div style="width:94.5%; margin-left:2.5%">
		<h1>Courses</h1>
		<hr border-top: 10px solid black; border-radius: 5px;>

        <!--Course Card Counter-->
        <?php $counter = 0 ?>
        <!--Table formatting for each course-->
        <table style="border-collapse: separate; border-spacing: 20px;">
                <?php //checks if the user is an instructor, if so displays course creation card
                    if($_SESSION["accType"] == "I"){
                        echo 
                        "<td>
                            <div class=\"card bg-light mb-3\" style=\"height: 12rem; width: 18rem;\">
                                <div class=\"card-header\">Course Creation</div>
                                <div class=\"card-body text-dark\" style=\"padding-top:18%;margin: auto\">
                                    <form action=\"dash.php\" method=\"post\">
                                        <input type=\"hidden\" name=\"action\" value=\"createCourse\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block\">Create New Course</button>
                                    </form>
                                </div>
                            </div>
                        </td>";
                        $counter+=1; //increments course card counter
                    }
                ?>
                <!--Goes through each retrieved course and displays them as cards, allowing for the user to navigate to one-->
                <?php foreach ($courses as $course){
                    //Checks if the student has accepted enrollment into each course, if so displays it on the dashboard
                    if(getRosterEnrollment($course['id'],$_SESSION['accEmail']) == 1){
                        //Course Cards
                        echo "
                            <td>
                                <div class=\"card bg-light mb-3\" style=\"height: 12rem; width: 18rem;\">
                                    <div class=\"card-header\">Course ID: ".$course['id']."</div>
                                    <div class=\"card-body text-dark\">
                                        <h5 class=\"card-title\" style=\"padding-bottom:10%\">".$course['name']."</h5>
                                        <form action=\"dash.php\" method=\"post\">
                                            <input type=\"hidden\" name=\"action\" value=\"selectCourse\">
                                            <input type=\"hidden\" name=\"courseID\" value=".$course['id'].">
                                            <button type=\"submit\" class=\"btn btn-primary\">Select</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            ";
                        $counter+=1; //increments course card counter
                        //Checks if a new row needs to be created for spacing (creates a new row every 5 cards)
                        if($counter == 5){
                            echo "<tr></tr>";
                            $counter = 0; //resets course card counter
                        }
                    }
                }
                ?>
        </table>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>