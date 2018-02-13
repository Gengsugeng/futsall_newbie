<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Penyewa</li>
</ol>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
        	<div class="card-header">
          		<i class="fa fa-table"></i> Data Penyewa
          	</div>
        	<div class="card-body">
        		  <?php echo form_open('penyewa/create'); ?>
                <div class="form-group col-6">
                  <label>Nama</label>
                  <input class="form-control" id="nama" name="namaText" type="text" placeholder="Masukkan Nama">
                </div>
                <div class="form-group col-6">
                  <label>Alamat</label>
                  <input class="form-control" id="username" name="alamatText" type="text" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group col-6">
                  <label>Email</label>
                  <input class="form-control" id="password" name="emailText" type="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group col-6">
                  <label>Telepon</label>
                  <input class="form-control" id="password" name="teleponText" type="number" placeholder="Masukkan No.Telepon">
                </div>
                <div class="form-group col-6">
                  <label>Password</label>
                  <input class="form-control" id="password" name="passwordText" type="password" placeholder="Masukkan Password">
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