<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Assignments</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function() {
			function updateAssignments() {
				$.post('/assignments/filter', $('#assignments').serialize(), function(res) {
					$('table#assignments').html(res);
				});
			}

			$('#assignments').on('change', 'input[type="checkbox"], select', function(e) {
				updateAssignments();
			});

			updateAssignments();
		});
    </script>
</head>
<body>
	<div class="wrapper">
		<form id="assignments"  action="/assignments/filter" method="post">
			<input type="checkbox" name="easy" value="Easy"><label for="Easy">Easy</label>
			<input type="checkbox" name="intermediate" value="Intermediate"><label for="Intermediate">Intermediate</label>
			<select name="assignments">
				<option value="Introduction" name="assignments"><label for="Introduction">Introduction</label></option>
				<option value="Web Fundamentals" name="assignments"><label for="Web Fundamentals">Web Fundamentals</label></option>
				<option value="PHP" name="assignments"><label for="PHP">PHP</label></option>
			</select>
			<input type="hidden" value="Update" name="action">
		</form>
		<table id="assignments">
		</table>
	</div>
</body>
</html>