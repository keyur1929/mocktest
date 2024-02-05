<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Easiest Way to Add Input Masks to Your Forms</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
		rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<div class="registration-form">
		<form method="POST">
			<div style="display: flex; align-items: center; justify-content: center; margin-bottom: 50px;">
				<img src="bg4.png" alt="">
			</div>
			<div style="text-align: center; margin-bottom: 50px;">
				<h4>Staurday Mock Test Registration</h4>
			</div>
			<div class="form-group">
				<input type="text" class="form-control item" id="username" name="stuname" placeholder="Student Name" required>
			</div>
			<div class="form-group">
				<input id="password-field"
					oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
					maxlength="10" type="number" name="stunumber" class="form-control item" placeholder="Mobile No."
					required>
			</div>
			<input type="hidden" class="form-control" name="date_hid" id="digital-clock">
			<div class="form-group" style="text-align: center;">
				<p>Will you attend Mock Test?</p>
			</div>
			<div class="form-group" style="text-align: center;">
				<input type="radio" name="example" id="hide" value="YES"> <label for="hide">YES</label>
				<input style=" margin-left: 10px;" type="radio" name="example" id="show" value="NO">
				<label for="show">NO</label>
			</div>
			<div class="form-group" style="text-align: center; display: none;" id="invisible">
				<p>Why you will not able to attend Mock Test?</p>
				<input id="ausrequired" type="text" name="sanswer" class="form-control item" placeholder="Answer">
			</div>
			<div class="form-group">
				<button type="submit" name="save_btn" class="btn btn-block create-account">Submit</button>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="script.js"></script>
	<script>
		const box = document.getElementById('invisible');
		const answer = document.getElementById('ausrequired');

		function handleRadioClick() {
			if (document.getElementById('show').checked) {
				box.style.display = 'block';
				answer.required = true;

			} else {
				box.style.display = 'none';
				answer.required = false;
			}
		}

		const radioButtons = document.querySelectorAll('input[name="example"]');
		radioButtons.forEach(radio => {
			radio.addEventListener('click', handleRadioClick);
		});

		function getDateTime() {
			var now = new Date();
			var year = now.getFullYear();
			var month = now.getMonth() + 1;
			var day = now.getDate();
			var hour = now.getHours();
			var minute = now.getMinutes();
			var second = now.getSeconds();
			if (month.toString().length == 1) {
				month = '0' + month;
			}
			if (day.toString().length == 1) {
				day = '0' + day;
			}
			if (hour.toString().length == 1) {
				hour = '0' + hour;
			}
			if (minute.toString().length == 1) {
				minute = '0' + minute;
			}
			if (second.toString().length == 1) {
				second = '0' + second;
			}
			var dateTime = year + '-' + month + '-' + day + ' ' + hour + ':' + minute;
			return dateTime;
		}

		// example usage: realtime clock
		setInterval(function () {
			currentTime = getDateTime();
			document.getElementById("digital-clock").value = currentTime;
		}, 1000);

	</script>
</body>
<?php

if (isset($_POST['save_btn'])) {
	$names = $_POST['stuname'];
	$mobile = $_POST['stunumber'];
	$answer = $_POST['sanswer'];
	$date = $_POST['date_hid'];


	$query = "INSERT INTO exam(mname,mphone,answer,date) VALUES('$names','$mobile','$answer','$date')";

	$data = mysqli_query($con, $query);
	if ($data) {
		?>
		<script type="text/javascript">
			alert("Mocktest review Successfully");

		</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert("Please try again");

		</script>
		<?php
	}




}
?>

</html>