<?php 

	require_once '../includes/DbOperation.php';
	$response = array();

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (isset($_POST['nama_penerima']) and
				isset($_POST['no_resi'])
			) {
			
			$db = new DbOperation();
			if($db->createData(
				$_POST['nama_penerima'],
				$_POST['no_resi']
			)){
				$response['error'] = false;
				$response['message'] = "data berhasil ditambahkan";
			}else{
				$response['error'] = true;
				$response['message'] = "data gagal ditambahkan";
			}

		}else{
			$response['error']=true;
			$response['message']="tidak boleh kosong";
		}

	}else{
		$response['error']=true;
		$response['message']="Gagal";
	}

 echo json_encode($response);