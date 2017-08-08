<?php include("../controller/manageForm.php");
	$res = getAll();
?>
<html>
<head>
	<title>Simple Login form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<button id="showForm">Add New</button>
<form action="" method="POST" id="formData" style="display:none">
	<input type="text" name="name" placeholder="Enter Name">
	<input type="text" name="email" placeholder="Enter Email">
	<input type="text" name="phone" placeholder="Enter Phone">
	<input type="text" name="address" placeholder="Enter Address">
	<input type="number" name="age" placeholder="Enter Age">
	<input type="submit" >
</form>

<table>
	<thead>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Age</th>
		<th>Address</th>
	</thead>
	<tbody>
		<?php 
		$u= 0;
		foreach($res as $r){
			$u++;
			?>
			<tr>
				<td><?=$u?></td>
				<td><?=$r->name?></td>
				<td><?=$r->email?></td>
				<td><?=$r->phone?></td>
				<td><?=$r->address?></td>
				<td><?=$r->age?></td>
			</tr>

			<?php
			}?>
	</tbody>
</table>

</body>
</html>

<script>

	$("#showForm").on('click',function(e){
		$("#formData").show();
	})

	$("#formData").on('submit',function(e){
		var data = $("#formData").serialize();

		$.ajax({
			url:"./../controller/manageForm.php",
			data:data,
			type:'post',
			success:function(data){
				console.log(data);
			},
			error:function(data){
				console.log(data);
			}
		})
	})
</script>