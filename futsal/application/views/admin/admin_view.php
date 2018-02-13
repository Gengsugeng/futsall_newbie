<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Admin</li>
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
          		<i class="fa fa-table"></i> Data Admin
          	</div>
        	<div class="card-body">
        		<a href="<?php echo base_url('admin/create') ?>"><button type="button" class="btn btn-primary">Tambah</button></a><br><br>
      			<div class="table-responsive">
      				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php foreach ($record as $r) { ?>
								<tr>
									<td><?php echo $r->nama ?></td>
									<td><?php echo $r->username ?></td>
									<td colspan ='2'>
										<a href="<?php echo base_url('admin/edit/'.$r->id_admin) ?>"><button type='button' class='btn btn-success'>Edit</button></a>
										<a href="<?php echo base_url('admin/delete/'.$r->id_admin) ?>"><button type='button' class='btn btn-danger'>Hapus</button></a>
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