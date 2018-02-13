<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Lapangan</li>
</ol>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
        	<div class="card-header">
          		<i class="fa fa-table"></i> Data Lapangan
          	</div>
        	<div class="card-body">
        		  <?php echo form_open_multipart('lapangan/create'); ?>
                <div class="form-group col-6">
                  <label>Nomor Lapangan</label>
                  <input class="form-control" id="nomor" name="nomorText" type="text" placeholder="Masukkan Nomor Lapangan" required="required">
                </div>
                <div class="form-group col-6">
                  <label>Ukuran</label><br>
                  <label>
                    <input type="radio" name="ukuranText" id="inputUkuranTe" value="Besar">
                    Besar
                  </label><br>
                  <label>
                    <input type="radio" name="ukuranText" id="inputUkuranTe" value="Kecil">
                    Kecil
                  </label>
                </div>

                <div class="form-group col-6">
                  <label>Lapangan</label><br>
                  <label>
                    <input type="radio" name="textureText" id="inputUkuranTe" value="Rumput">
                    Rumput
                  </label><br>
                  <label>
                    <input type="radio" name="textureText" id="inputUkuranTe" value="Vinyl">
                    Vinyl
                  </label>
                </div>
                <div class="form-group col-6">
                  <label>Harga</label>
                  <input class="form-control" id="harga" name="hargaText" type="text" placeholder="Masukkan Harga" required="required">
                </div>
                <div class="form-group col-6">
                  <label>Gambar</label>
                  <input class="form-control" id="gambar" name="foto" type="file">
                </div>
                <div class="form-group col-2">
                  <?php 
                  $attr = array('class' => 'btn btn-primary btn-block');
                  echo form_submit('submit', 'Buat', $attr); ?>
                  <!-- <button type="submit" class="btn btn-primary btn-block ">Buat</button> -->
                </div>
              <?php echo form_close(); ?>          </div>
        </div>
    </div>
</div>