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

	public function registAdmin($id_pengurus, $nama, $no_hp, $gender, $alamat, $jabatan, $email, $password){
			$id_anggota = mysqli_real_escape_string($this->db,$_POST['id_anggota']);
			$nama = mysqli_real_escape_string($this->db,$_POST['nama']);
			$no_hp = mysqli_real_escape_string($this->db,$_POST['no_hp']);
			$alamat = mysqli_real_escape_string($this->db,$_POST['alamat']);
			$alamat = mysqli_real_escape_string($this->db,$_POST['jabatan']);
			$gender = mysqli_real_escape_string($this->db,$_POST['gender']);
			$email = mysqli_real_escape_string($this->db,$_POST['email']);
			$password = mysqli_real_escape_string($this->db,$_POST['password']);

			$sql1="SELECT * FROM pengurus WHERE email='$email'";
			$check = $this->db->query($sql1) ;
			$count_row = $check->num_rows;

			if ($count_row == 0){
				$sql2="INSERT INTO pengurus (id_pengurus, nama, noHP, alamat, jabatan, gender, email, password) VALUES ('$id_pengurus', '$nama', '$no_hp', '$alamat', 'jabatan', '$gender', '$email', '$password')";

			$result = mysqli_query($this->db,$sql2);

			if($sql2){
			header('../loginAdmin.php?p=regist#popup2');
   				 return $result;
				return true;
					}  else {
 			     // echo 'Anda gagal mendaftar, E-mail sudah terdaftar';
						return false;
					}
			}
	}


}
?>
