<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Transaksi</li>
</ol>
<?php 
$true = $this->session->flashdata('feedback_true');
$false = $this->session->flashdata('feedback_false');
if ($true) {
	echo "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <strong>".$true."</strong>
  </div>";
} elseif($false){
	echo "<div class='alert alert-danger'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <strong>".$false."</strong>
  </div>";
}
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-3">
        	<div class="card-header">
          		<i class="fa fa-table"></i> Data Transaksi
          	</div>
        	<div class="card-body">
          			<div class="table-responsive">
          				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Lapangan</th>
									<th>Lama</th>
									<th>Bayar</th>
									<th>Status</th>
									<th>Bukti</th>
									<th>Kurang</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>Lapangan</th>
									<th>Lama</th>
									<th>Bayar</th>
									<th>Status</th>
									<th>Bukti</th>
									<th>Kurang</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($record as $r) { ?>
									<tr>
										<td><?php echo $r->nama ?></td>
										<td><?php echo $r->lapangan ?></td>
										<td><?php echo $r->lama.' jam' ?></td>
										<td><?php echo 'Rp. '.$r->bayar ?></td>
										<td><?php echo $r->status ?></td>
										<td>
											<?php if($r->bukti == ''){
												echo '<span class="badge badge-danger">Belum Ada</span>';
											}elseif (!empty($r->bukti)) {
												echo '<span class="badge badge-primary">Ada</span>';
											}else {
												echo '<span class="badge badge-warning">Ok</span>';
											} ?>
												
										</td>
										<td><?php echo 'Rp. '.$r->kurang ?></td>
										<td>
										<a href="<?php echo base_url('transaksi/edit/'.$r->id_transaksi)?>"><button type='button' class='btn btn-success'>Cek</button></a>
										<a href="<?php echo base_url('transaksi/delete/'.$r->id_transaksi)?>"><button type='button' class='btn btn-danger'>Hapus</button></a>
										</td>
									</tr>
								<?php } ?>
						</tbody>
      				</table>
      			</div>
          	</div>
        </div>
    </div>
</div>