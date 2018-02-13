<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Pemesanan</li>
</ol>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
        	<div class="card-header">
          		<i class="fa fa-table"></i> Data Pemesanan
          	</div>
        	<div class="card-body">
        		<a href="<?php echo base_url('pemesanan/create') ?>"><button type="button" class="btn btn-primary">Tambah</button></a><br><br>
      			<div class="table-responsive">
      				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Lapangan</th>
								<th>Lama</th>
								<th>Jam</th>
								<th>Tanggal Pesan</th>
								<th>Tanggal Main</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
								<th>Lapangan</th>
								<th>Lama</th>
								<th>Jam</th>
								<th>Tanggal Pesan</th>
								<th>Tanggal Main</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php foreach ($record as $r) { ?>
								<tr>
									<td><?php echo $r->nama ?></td>
									<td><?php echo $r->lapangan ?></td>
									<td><?php echo $r->lama ?></td>
									<td><?php echo $r->jam ?></td>
									<td><?php echo $r->tgl_pesan ?></td>
									<td><?php echo $r->tgl_main ?></td>
									<td>
										<?php if ($r->transaksi == null) {
											echo '<a href="'.base_url('transaksi/create/'.$r->id_pemesanan.'/'.$r->id_penyewa).'"><button type="button" class="btn btn-info">Bayar</button></a>';
										} else {
											echo '
											<span class="label label-success">Transaksi OK</span>';
										} ?>
									</td>
								</tr>
							<?php }?>
						</tbody>
					</table>
      			</div>
          	</div>
        </div>
    </div>
</div>