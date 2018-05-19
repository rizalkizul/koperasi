<?php
include "../controller/connection.php";

class User{

	public $db;

	public function __construct(){
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
		exit;
		}
	}

	public function checkLogin($email, $password){
			$username = mysqli_real_escape_string($this->db,$_POST['email']);
			$password = mysqli_real_escape_string($this->db,$_POST['password']);
			$sql2="SELECT * from pengguna WHERE email='$email' and password='$password'";

			$result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;

			if ($count_row == 1) {	
					return true;
					}else{
				return false;
			}
	}		

}
?>
