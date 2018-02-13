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
          		<i class="fa fa-table"></i> Form Transaksi
          	</div>
        	<div class="card-body">
        	   <?php echo form_open_multipart('transaksi/create'); ?>
                
                <div class="form-group col-6">
                  <input class="form-control" id="nama" name="pesanText" type="number" value="<?php echo $id_pemesanan; ?>" hidden="true">
                </div>
                <div class="form-group col-6">
                  <input class="form-control" id="nama" name="penyewaText" type="number" value="<?php echo $id_penyewa; ?>" hidden="true">
                </div>
                <div class="form-group col-6">
                  <label>Harga</label>
                  <input class="form-control" id="nama" name="hargaText" type="number" value="<?php echo $bayar; ?>">
                </div>
                <div class="form-group col-6">
                  <label>Pembayaran</label><br>
                  <label>
                    <input type="radio" name="statusText" id="inputUkuranTe" value="DP">
                    DP
                  </label><br>
                  <label>
                    <input type="radio" name="statusText" id="inputUkuranTe" checked="checked" value="Lunas">
                    Lunas
                  </label>
                </div>
                <div class="form-group col-6">
                  <label>Jumlah DP</label>
                  <input class="form-control" id="nama" name="dpText" type="number">
                </div>

                <div class="form-group col-6">
                  <label>Bukti</label>
                  <input class="form-control" id="nama" name="bukti" type="file">
                </div>

                <div class="form-group col-2">
                  <?php 
                  $attr = array('class' => 'btn btn-primary btn-block');
                  echo form_submit('submit', 'Process', $attr); ?>
                  <!-- <button type="submit" class="btn btn-primary btn-block ">Buat</button> -->
                </div>
              <?php echo form_close(); ?>
          </div>
        </div>
    </div>
</div>