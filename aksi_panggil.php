<?php

	include "koneksi.php";
	$act=$_GET[act];
	$id = $_GET[id];
	$loket = $_GET[loket];
	if ($act == "clear"){
		if ($loket == 1){
			mysql_query ("UPDATE tbl_umum SET status= 1, panggil = 1, loket = 1 WHERE id = $id ");
		} else if ($loket == 2){
			mysql_query ("UPDATE tbl_umum SET status= 1, panggil = 1, loket = 2 WHERE id = $id ");
		} else if ($loket == 3){
			mysql_query ("UPDATE tbl_bpjs_rajal SET status= 1, panggil = 1, loket = 3 WHERE id = $id ");
		} else if ($loket == 4){
			mysql_query ("UPDATE tbl_bpjs_rajal SET status= 1, panggil = 1, loket = 4 WHERE id = $id ");
		}
	} else if ($act == "clearer"){
		if ($loket == 1){
			mysql_query ("UPDATE tbl_umum SET status= 1, panggil = 0, loket = 1 WHERE id = $id ");
		} else if ($loket == 2){
			mysql_query ("UPDATE tbl_umum SET status= 1, panggil = 0, loket = 2 WHERE id = $id ");
		} else if ($loket == 3){
			mysql_query ("UPDATE tbl_bpjs_rajal SET status= 1, panggil = 0, loket = 3 WHERE id = $id ");
		} else if ($loket == 4){
			mysql_query ("UPDATE tbl_bpjs_rajal SET status= 1, panggil = 0, loket = 4 WHERE id = $id ");
		}
	} else if ($act == "hold"){
		if ($loket == 1 OR $loket == 2){
			mysql_query ("UPDATE tbl_umum SET status= 2, panggil = 0, loket = 0 WHERE id = $id ");
			if ($loket == 1) {
				mysql_query ("UPDATE tbl_umum SET panggil = 0, loket = 0 WHERE status = 0 AND loket = 1");
			} else if ($loket == 2) {
				mysql_query ("UPDATE tbl_umum SET panggil = 0, loket = 0 WHERE status = 0 AND loket = 2");
			}	
		} else if ($loket == 3 OR $loket == 4){
			mysql_query ("UPDATE tbl_bpjs_rajal SET status= 2, panggil = 0, loket = 0 WHERE id = $id ");
			if ($loket == 3) {
				mysql_query ("UPDATE tbl_bpjs_rajal SET panggil = 0, loket = 0 WHERE status = 0 AND loket = 3");
			} else if ($loket == 4) {
				mysql_query ("UPDATE tbl_bpjs_rajal SET panggil = 0, loket = 0 WHERE status = 0 AND loket = 4");
			}
		}
	}
		if ($loket == 1){
			header('location:counterumumloket1.php?act=default');
		} else if ($loket == 2){
			header('location:counterumumloket2.php?act=default');
		} else if ($loket == 3){
			header('location:counterumumloket3.php?act=default');
		} else if ($loket == 4){
			header('location:counterumumloket4.php?act=default');
		}

?>