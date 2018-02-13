<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Penyewa</li>
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
          		<i class="fa fa-table"></i> Data Penyewa
          	</div>
        	<div class="card-body">
        		<a href="<?php echo base_url('penyewa/create') ?>"><button type="button" class="btn btn-primary">Tambah</button></a><br><br>
      			<div class="table-responsive">
      				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php foreach ($record as $r) { ?>
								<tr>
									<td><?php echo $r->nama ?></td>
									<td><?php echo $r->alamat ?></td>
									<td><?php echo $r->telepon ?></td>
									<td><?php echo $r->email ?></td>
									<td>
										<a href="<?php echo base_url('penyewa/delete/' .$r->id_penyewa) ?>"><button type='button' class='btn btn-danger'>Hapus</button></a>
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