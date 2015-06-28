<?php
/**
 * Created by PhpStorm.
 * User: Jhoony
 * Date: 27-Jun-15
 * Time: 11:17 AM
 */
 
include 'db_connect.php';

if(! isset($_GET['id_kelurahan'])) {
	$res = mysql_query("SELECT * FROM usaha WHERE statusUsaha = 1 ORDER BY namaUsaha");
} else {
	$res = mysql_query("SELECT * FROM usaha WHERE statusUsaha = 1 AND idKelurahan = '{$_GET['id_kelurahan']}' ORDER BY namaUsaha");
}
if ($res === false) {
	$respond['status'] = 500;
} else {
	$usaha = array();
	
	while ($data = mysql_fetch_array($res)) {
		$usaha[] = array(
					'idUsaha' => $data['idUsaha'], 
					'namaUsaha' => $data['namaUsaha'], 
					'latitude' => $data['latitude'], 
					'longtitude' => $data['longtitude'],
					'alamatUsaha' => $data['alamatUsaha']
				);
	}
	
	$respond['status'] = 200;
	$respond['usaha'] = $usaha;
}

echo json_encode($respond);