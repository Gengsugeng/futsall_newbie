<?php
require_once('lib/nusoap.php');
$server = new soap_server();
$ns = "http://localhost/futsal_api/SOAPfutsal/server.php";
$server->configureWSDL('Master', $ns);
$server->wsdl->schemaTargetNamespace = $ns;

function readPemesanan() {
	$con = new mysqli("localhost", "root", "", "proyek2");
	if ($con->connect_error) {
		return new soap_fault('Database Server', '', 'Koneksi database gagal!', '');
	}
	else {
		$result = $con->query("SELECT pemesanan.*, penyewa.nama as nama_penyewa, lapangan.nama as nama_lapangan, lapangan.harga, transaksi.id_pemesanan as transaksi FROM pemesanan JOIN penyewa ON pemesanan.id_penyewa = penyewa.id_penyewa JOIN lapangan ON pemesanan.id_lapangan = lapangan.id_lapangan LEFT JOIN transaksi ON pemesanan.id_pemesanan = transaksi.id_pemesanan");
		while ($row = $result->fetch_assoc()) {
			$hasil[] = array(
				'nama_penyewa' => $row["nama_penyewa"],
				'nama_lapangan' => $row["nama_lapangan"],
				'lama' => $row["lama"],
				'bayar' => $row["bayar"],
				'jam' => $row["jam"],
				'tgl_pesan' => $row["tgl_pesan"],
				'tgl_main' => $row["tgl_main"],
				'transaksi' => $row["transaksi"]
			);
		}
		return $hasil;
	}
	
}

function createPemesanan($id){
	$con = new mysqli("localhost", "root", "", "proyek2");
	if ($con->connect_error) {
		return new soap_fault('Database Server', '', 'Koneksi database gagal!', '');
	}
	else {
		$select = $con->query("SELECT harga FROM lapangan WHERE id_lapangan = '$id[id_lapangan]'");
		$row = $select->fetch_assoc();
		$harga = $row['harga']*$id['lama'];
		$tgl = date("Y-m-d");
		$result = $con->query("INSERT INTO pemesanan VALUES ('','$id[id_penyewa]','$id[id_lapangan]','$id[lama]','$harga','$id[jam]','$tgl','$id[tanggal]')");
		if ($result == true) {
			$r = 1;
		}
		else {
			$r = 0;
		}
		return $hasil = array('status'=>$r);
		return $hasil;
	}
}

function readPenyewa() {
	$con = new mysqli("localhost", "root", "", "proyek2");
	if ($con->connect_error) {
		return new soap_fault('Database Server', '', 'Koneksi database gagal!', '');
	}
	else {
		$result = $con->query("SELECT * FROM penyewa");
		while ($row = $result->fetch_assoc()) {
			$hasil[] = array(
				'id_penyewa' => $row['id_penyewa'],
				'nama' => $row["nama"],
				'alamat' => $row["alamat"],
				'telepon' => $row["telepon"],
				'email' => $row["email"],
				'password' => $row["password"]
			);
		}
		return $hasil;
	}
	
}

function readLapangan() {
	$con = new mysqli("localhost", "root", "", "proyek2");
	if ($con->connect_error) {
		return new soap_fault('Database Server', '', 'Koneksi database gagal!', '');
	}
	else {
		$result = $con->query("SELECT * FROM lapangan");
		while ($row = $result->fetch_assoc()) {
			$hasil[] = array(
				'id_lapangan' => $row['id_lapangan'],
				'nama' => $row["nama"],
				'ukuran' => $row["ukuran"],
				'texture' => $row["texture"],
				'harga' => $row["harga"]
			);
		}
		return $hasil;
	}
	
}

$server->register(
	'readPemesanan', 
	array('input' =>'xsd:String'), 
	array('output'=>'xsd:Array'), 
	$ns,
	false,
	'rpc',
	'encoded',
	'Tampil data Menu'
);

$server->register(
	'createPemesanan', 
	array('input' =>'xsd:Array'), 
	array('output'=>'xsd:Array'), 
	$ns,
	false,
	'rpc',
	'encoded',
	'Tampil data Menu'
);

$server->register(
	'readPenyewa', 
	array('input' =>'xsd:String'), 
	array('output'=>'xsd:Array'), 
	$ns,
	false,
	'rpc',
	'encoded',
	'Tampil data Menu'
);

$server->register(
	'readLapangan', 
	array('input' =>'xsd:String'), 
	array('output'=>'xsd:Array'), 
	$ns,
	false,
	'rpc',
	'encoded',
	'Tampil data Menu'
);

if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
exit();
?>