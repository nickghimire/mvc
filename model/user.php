<?php

	class User{
		private $name;
		private $email;
		private $address;
		private $phone;
		private $age;


		function setName($name){
			$this->name = $name;
		}


		function setEmail($email){
			$this->email = $email;
		}


		function setAddress($address){
			$this->address = $address;
		}


		function setPhone($phone){
			$this->phone = $phone;
		}


		function setAge($age){
			$this->age = $age;
		}

		function save(){
			require_once dirname(__FILE__)."/../config/dbHelper.php";
			$conn = dbConnect();
			$sql = "INSERT INTO tbl_form (name,email,phone,address,age) VALUES(?,?,?,?,?)";
			if($stmt = $conn->prepare($sql)){
				$stmt->bind_param('ssssi',$this->name,$this->email,$this->phone,$this->address,$this->age);
				if($stmt->execute()){
					return true;
				}
			}
			return false;
		}

		function getAll(){
			require_once dirname(__FILE__)."/../config/dbHelper.php";
			$result = array();
			$conn = dbConnect();
			$sql = "SELECT id, name, email, phone, address,age from tbl_form";
			if($stmt=$conn->prepare($sql)){
				if($stmt->execute()){
					$stmt->store_result();
					$stmt->bind_result($id,$name,$email,$phone,$address,$age);
					while($stmt->fetch()){
						$res = (object)array();
						$res->id = $id;
						$res->name = $name;
						$res->email = $email;
						$res->phone =$phone;
						$res->address = $address;
						$res->age = $age;

						$result[] = $res;
					}
					return $result;
				}
			}
			return false;
		}
	}

?>