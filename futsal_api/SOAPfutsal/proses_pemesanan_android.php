<?php
    require_once('lib/nusoap.php');
    $client = new nusoap_client('http://localhost/futsal_api/SOAPfutsal/server.php?wsdl',true);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $param = array('id_penyewa' => $_POST['id_penyewa'],
                        'id_lapangan' => $_POST['id_lapangan'],
                        'lama' => $_POST['lama'],
                        'jam' => $_POST['jam'],
                        'tanggal' => $_POST['tgl_main']);

        $respon = $client->call('createPemesanan', array($param));
        if($respon['status'] == 1){
            echo "Data berhasil ditambah";
        }else{
            echo "Data gagal ditambah";
        }
    } 
?>