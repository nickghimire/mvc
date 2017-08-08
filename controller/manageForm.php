<?php
	require_once dirname(__FILE__)."/../model/user.php";
	if(isset($_POST['name'])){

		$user = new User();
		$user->setName($_POST['name']);
		$user->setAddress($_POST['address']);
		$user->setEmail($_POST['email']);
		$user->setPhone($_POST['phone']);
		$user->setAge($_POST['age']);


		if($user->save()){
			header("Location:../views/afterSubmit.php");
		}else{
			echo "<script>alert('Something went Wrong');
				window.location.href='../views/index.php';
			</script>";
		}                                                 
	}

	function getAll(){
		$user = new User();
		if($res = $user->getAll()){
			return $res;
		}else{
			return false;
		}
	}
?>