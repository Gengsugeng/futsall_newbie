<?php
	require_once('lib/nusoap.php');
    $client = new nusoap_client('http://localhost/futsal_api/SOAPfutsal/server.php?wsdl',true);

	if (isset($_POST['buat'])) {
        $param = array('id_penyewa' => $_POST['idText'],
                        'id_lapangan' => $_POST['lapanganText'],
                        'lama' => $_POST['lamaText'],
                        'jam' => $_POST['jamText'],
                        'tanggal' => $_POST['tanggalText']);

        $respon = $client->call('createPemesanan', array($param));
        if($respon['status'] == 1){
            echo "Data berhasil ditambah";
        }else{
            echo "Data gagal ditambah";
        }
    } 
?>