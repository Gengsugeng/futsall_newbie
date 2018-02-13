<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Pemesanan</li>
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
          		<i class="fa fa-table"></i> Data Pemesanan
          	</div>
        	<div class="card-body">
        	   <?php echo form_open('pemesanan/create'); ?>
                <div class="form-group col-6">
                  <label>Nama</label>
                  <select name="idText" id="input" class="form-control" required="required">
                    <?php foreach ($penyewa as $g) {?>
                    <option value="<?php echo $g->id_penyewa ?>"><?php echo $g->nama ?></option>
                    <?php }?>
                  </select>
                </div><!-- 
                <div class="form-group col-6">
                  <label>Nama</label>
                  <input class="form-control" id="nama" name="namaText" type="text" value="<?php //echo $guest[0]->nama ?>" readonly="true">
                  <input class="form-control" id="nama" name="idText" type="text" value="<?php //echo $guest[0]->id_penyewa ?>" hidden="true">
                </div> -->
                <div class="form-group col-6">
                  <label>Lapangan</label>
                  <select name="lapanganText" id="input" class="form-control" required="required">
                    <?php foreach ($lapangan as $l) {?>
                    <option value="<?php echo $l->id_lapangan ?>"><?php echo $l->nama.'- Rp. '.$l->harga ?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group col-6">
                  <label>Lama</label>
                  <input class="form-control" id="lama" name="lamaText" type="number" placeholder="Durasi Main">
                </div>
                <div class="form-group col-6">
                  <label>Jam Main</label>
                  <input class="form-control" id="jam" name="jamText" type="time">
                </div>
                <div class="form-group col-6">
                  <label>Tanggal</label>
                  <input class="form-control" id="tanggal" name="tanggalText" type="date">
                </div>
                <div class="form-group col-2">
                  <?php 
                  $attr = array('class' => 'btn btn-primary btn-block');
                  echo form_submit('submit', 'Buat', $attr); ?>
                  <!-- <button type="submit" class="btn btn-primary btn-block ">Buat</button> -->
                </div>
              <?php echo form_close(); ?>
          </div>
        </div>
    </div>
</div>