<!--Includes the defined header-->
<?php include '../view/empHeader.php'; ?>

<?php
//Creates or resumes session (if not already started)
if(!isset($_SESSION))
{
	session_start();
}
?>
<main>
    <h1>Employee List</h1>
        <div class="col-sm">
            <!-- displays all employees -->
            <table>
                <tr>
                    <th>Employee ID</th>
                    <th>Department ID</th>
                    <th>Employee Name</th>
					<!-- also displays salary, email, and password if CEO is logged in -->
					<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
						<th>Salary</th>
						<th>Email</th>
						<th>Password</th>
					<?php endif;?>
                </tr>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?php echo $employee['empID']; ?></td>
                        <td><?php echo $employee['deptID']; ?></td>
						<td><?php echo $employee['empName']; ?></td>
						<!-- also displays salary, email, and password if CEO is logged in -->
						<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
							<td><?php echo $employee['salary']; ?></td>
							<td><?php echo $employee['email']; ?></td>
							<td><?php echo $employee['password']; ?></td>
							<!-- don't show fire next to CEO -->
							<?php if($employee['email'] != "fdecker@gmail.com"): ?>
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