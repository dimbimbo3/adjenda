<!--Includes the defined header-->
<?php include '../view/header.php'; ?>

<style>
	.my-custom-scrollbar {
	position: relaive;
	height: 450px;
	width: 600px;
	overflow: auto;
}
.my-custom-scrollbar-popup {
	position: relative;
	height: 350px;
	width: 468px;
	overflow: auto;
}
ul.no-bullets {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
.table-wrapper-scroll-y {
	display: block;
}

.table-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
  background-color: #2d2d2d;
  border-color: #2d2d2d;
  color: white;
}
.table-striped>tbody>tr:nth-child(even)>td,
.table-striped>tbody>tr:nth-child(even)>th {
  background-color: #4d4d4d;
  border-color: #4d4d4d;
  color: white;
}
</style>

<main>
	<!-- Course Header -->
	<div style="width:94.5%; margin-left:2.5%">
		<h1>(Course ID: <?php echo $course['id'].") ".$course['name'] ?></h1>
		<hr border-top: 10px solid black; border-radius: 5px;>
	</div>

	<!-- Course Information -->
	<div style="width:94.5%; height:600px; margin-left:2.5%; background-color: #EBEBEC; border-radius: 0.5em;">
		<header>
			<nav class="navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #0079C2; border-radius: 0.5em; height: 8%;">
				<ul class="navbar-nav" style="margin-left:2%">
					<li class="nav-item">
						<a class="nav-link" style="color: white;" href="../course/course.php">
							Class Roster
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: white;" href="#">
							Groups
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: white;" href="#">
							Polls
						</a>
					</li>
				</ul>
			</nav>
		</header>

		<!-- Found Students -->
		<div style="padding-left: 5%; padding-bottom: 3%; float: left" width="100%">
			<?php if(!empty($eligibleStudents)): ?>
				<h3>Students found with: '<?php echo $searchTerm ?>'</h3>
				<div class="table-wrapper-scroll-y my-custom-scrollbar" >
					<table class="table table-bordered table-striped mb-0">
						<tbody>
							<?php foreach($eligibleStudents as $eligibleStudent) : ?>
								<tr>
									<th scope="row" style="padding-left: 15%">
										<div class="students">
											<input type="checkbox" class="form-check-input" name="addedStudent[]" value="<?php echo $eligibleStudent['email'] ?>" required>
											<label class="form-check-label"><?php echo " ".$eligibleStudent['fName']." ".$eligibleStudent['lName']; ?></label>
										</div>
									</th>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php else: ?>
				<h3>No students found with: '<?php echo $searchTerm ?>'</h3>
			<?php endif; ?>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>