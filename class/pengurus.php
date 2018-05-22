<?php
include_once "../controller/connection.php";


class Pengurus{

	public $db;

	public function __construct(){
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
		exit;
		}
	}

	public function getSession(){
		return $_SESSION['login'];
	}

	public function userLogout() {
		$_SESSION['login'] = FALSE;
	session_destroy();
	}

	public function checkLogin($email, $password){
			$username = mysqli_real_escape_string($this->db,$_POST['email']);
			$password = mysqli_real_escape_string($this->db,$_POST['password']);
			$sqlLoginPeng="SELECT * from pengurus WHERE email='$email' and password='$password'";

			$result = mysqli_query($this->db,$sqlLoginPeng);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;

			if ($count_row == 1) {	
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['nama'] = $user_data['nama'];
				$_SESSION['id_pengurus'] = $user_data['id_pengurus'];
				return $_SESSION['nama'];
				return $_SESSION['id_pengurus'];
					return true;
					}else{
				return false;
			}
	}		

}
?>
