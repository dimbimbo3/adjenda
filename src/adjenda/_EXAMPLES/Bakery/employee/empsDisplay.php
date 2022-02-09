<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<!--Includes the defined header-->
<?php include '../view/empHeader.php'; ?>
<?php require_once('../model/deptFunctions.php'); ?>

<main>
    <h1>Employee List</h1>
        <div class="col-sm">
            <!-- displays all employees -->
            <table>
                <tr>
                    <th>Employee ID</th>
                    <th>Department ID</th>
					<th>Department Manager</th>
					<!-- spacing in table for make manager button if CEO is logged in -->
                    <?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
                            <th></th>
                    <?php endif;?>
                    <th>Employee Name</th>
					<th>Phone Number</th>
					<!-- also displays salary, email, and password if CEO is logged in -->
					<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
						<th>Hire Date</th>
						<th>Salary</th>
						<th>Email</th>
					<?php endif;?>
                </tr>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?php echo $employee['empID']; ?></td>
                        <td><?php echo $employee['departmentID']; ?></td>
						<?php 
							//checks if the employee is currently the manager of their department
							if(checkDeptMan($employee['empID']))
								echo "<td>Y</td>";
							else
								echo "<td>N</td>";
						?>
						<!-- displays option to make employee the manager of the their department if CEO is logged in -->
						<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
							<td>
								<form action="empsTable.php" method="post">
									<input type="hidden" name="action" value="makeDeptMan">
									<input type="hidden" name="empID" value="<?php echo $employee['empID']; ?>">
									<?php 
										//dont show manager button next to CEO
										if($employee['empEmail'] == "fdecker@gmail.com"){
											echo "";
										}
										//checks if the employee is currently the manager of their department
										else if(!checkDeptMan($employee['empID'])){
											echo "<input type=\"submit\" value=\"Make Manager\">";
										}
										else{
											echo "<button type=\"button\" disabled>Already Manager</button>";
										}
                                	?>
								</form>
							</td>
						<?php endif;?>
						<td><?php echo $employee['fName']." ".$employee['mInit']." ".$employee['lName']; ?></td>
						<td><?php echo $employee['empPhone']; ?></td>
						<!-- also displays salary, email, and password if CEO is logged in -->
						<!-- as well as the option to to fire an employee -->
						<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
							<td><?php echo $employee['hireDate']; ?></td>
							<td><?php echo $employee['salary']; ?></td>
							<td><?php echo $employee['empEmail']; ?></td>
							<!-- don't show fire next to CEO -->
							<?php if($employee['empEmail'] != "fdecker@gmail.com"): ?>
								<td>
									<form action="empsTable.php" method="post">
										<input type="hidden" name="action" value="fireEmp">
										<input type="hidden" name="empID"
											value="<?php echo $employee['empID']; ?>">
										<input type="submit" value="Fire">
									</form>
								</td>
							<?php endif;?>
						<?php endif;?>
                    </tr>
                <?php endforeach; ?>
				<!-- displays option to add a new employee if CEO is logged in -->
				<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
					<tr>
						<td>
							<form action="empsTable.php" method="post">
								<input type="hidden" name="action" value="newEmp">
								<input type="submit" value="Add new employee">
							</form>
						</td>
					</tr>
				<?php endif;?>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>