<!--Includes the defined header-->
<?php include '../view/header.php'; ?>

<style>
	.my-custom-scrollbar {
	position: relaive;
	height: 450px;
	width: 600px;
	overflow: auto;
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
		<h1>(Course: <?php echo $course['id'].") ".$course['name'] ?></h1>
		<hr border-top: 10px solid black; border-radius: 5px;>
	</div>

	<!-- Course Information -->
	<div style="width:94.5%; height:600px; margin-left:2.5%; background-color: #C8d1d4; border-radius: 0.5em;">
		<header>
			<nav class="navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #0079C2; border-radius: 0.5em; height: 8%;">
				<ul class="navbar-nav" style="margin-left:2%">
					<li class="nav-item">
						<a class="nav-link" style="color: white;" href="#">
							Class Roster
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

		<!-- Class Roster -->
		<div style="padding-left: 5%; padding-bottom: 3%; float: left" width="100%">
			<div class="table-wrapper-scroll-y my-custom-scrollbar" >
				<table class="table table-bordered table-striped mb-0">
					<tbody>
						<?php $numofstudents = sizeof($students); ?>
						<?php for ($x = 0; $x < $numofstudents; $x++) : ?>
							<tr>
								<th scope="row" style="padding-left: 15%"><?php echo $students[$x]['fName']." ".$students[$x]['lName']; ?></th>
							</tr>
						<?php endfor; ?>
					</tbody>
				</table>
			</div>
		</div>

		<?php if($_SESSION["accType"] == "S") : ?>
			<div class="form-group" style="float: right; padding-right: 5%; width: 400px">
				<a style="padding-left: 12%">Enter Attendance Code</a>
				<form action="course.php" method="post" style="padding-top:2%">
					<ul style="list-style: none;">
						<li>
							<input type="attendancecode" class="form-control" id="attendancecode" name="attendancecode" placeholder="Type your instructor's provided code" required>
						</li>
						<li style="padding-top:4%">
							<button type="submit" class="btn btn-primary">Submit</button>
						</li>
					</ul>
				</form>
			</div>
        <?php endif; ?>

		<?php if($_SESSION["accType"] == "I") : ?>
			<div class="form-group" style="float: right; width: 300px">
				<form action="course.php" method="post" style="padding-top:2%">
					<ul style="list-style: none;">
						<li style="padding-top:4%">
							<button type="button" class="btn btn-primary" style="width: 182px">Take Attendance</button>
						</li>
						<li style="padding-top:4%">
							<button type="button" class="btn btn-primary">View Attendance Logs</button>
						</li>
					</ul>
				</form>
			</div>
		<?php endif; ?>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>