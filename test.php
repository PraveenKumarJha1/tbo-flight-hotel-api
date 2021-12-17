<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST">
	
	<?php 
		for($i=1; $i<=2; $i++ ){

			// echo '<input type="text" name="passengers['.$i .'][name] ">';
		echo $x='<div class="adult">P-'.$i.'</div>
					<div class="input-fields">
					<select name="passengers[' .$i .'][gender]" class="form-select">
				        	<option value="1">Male</option>
				        	<option value="2">Female</option>
				    	</select>
				    	<select  name="passengers['.$i .'][Title]" class="form-select">
				            <option value="">Title</option>
				            <option value="Mr">Mr</option>
				            <option value="Ms">Ms</option>
				            <option value="Mrs">Mrs</option>
				    </select>
				    <input type="text" class="form-control name" name="passengers['.$i .'][FirstName]" placeholder="First Name" />
				    <input type="text" class="form-control name" name="passengers['.$i .'][lname]" placeholder="Last Name"/>
				    <input type="text" class="form-control" name="passengers['.$i .'][dob]" placeholder="Date of Birth" onfocus="(this.type=\'date\')"/>
				</div>
				<div class="input-fields" id="myDIV">
				    <input type="text" class="form-control" name="passengers['.$i .'][PassportNo]" placeholder="PassportNo" />
				    <input type="text" class="form-control" name="Ppassengers['.$i .'][assportExpiry]"placeholder="PassportExpiry" onfocus="(this.type=\'date\')"/>
		    </div>
'	;
echo "<br>";
		}



	?>
	<input type="submit" name="submit">
</form>


</body>
</html>
<?php
	print_r($_POST['passengers']);
	echo "<br>";
	print_r($_POST);
	
	?>