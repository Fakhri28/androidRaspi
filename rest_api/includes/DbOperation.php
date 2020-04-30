<?php 
	class DbOperation{
		private $con;

		function __construct(){

			require_once dirname (__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();
		}

		function createData($nama_penerima, $no_resi){
			$stmt = $this->con->prepare("INSERT INTO `data_paket`(`id`, `nama_penerima`, `no_resi`) VALUES (NULL,?,?);");
			$stmt->bind_param("ss", $nama_penerima, $no_resi);

			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		}
	}
 ?>