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
            <?php echo form_open('transaksi/edit/'.$this->uri->segment(3)) ?> 
            <?php foreach ($record as $r) {?>
                
                <div class="form-group col-6">
                  <img src="<?php echo $foto.$r->bukti ?>" width="200" height="200" class="img-responsive" alt="Image">
                </div>
            <?php }?>
                <div class="form-group col-2">
                  <a href="<?php echo base_url('transaksi') ?>"><button type="button" class="btn btn-primary btn-block">Kembali</button></a>
                  <?php 
                  //$attr = array('class' => 'btn btn-primary btn-block');
                  //echo form_submit('submit', 'Verifikasi OK', $attr); ?>
                </div>
                <?php echo form_close(); ?>
          </div>
        </div>
    </div>
</div>