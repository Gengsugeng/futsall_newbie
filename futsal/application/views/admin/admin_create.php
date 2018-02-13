<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
  <li class="breadcrumb-item active">Admin</li>
</ol>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
        	<div class="card-header">
          		<i class="fa fa-table"></i> Data Admin
          	</div>
        	<div class="card-body">
              <?php echo form_open('admin/create'); ?>
                <div class="form-group col-6">
                  <label>Nama</label>
                  <input class="form-control" id="nama" name="namaText" type="text" placeholder="Masukkan Nama">
                </div>
                <div class="form-group col-6">
                  <label>Username</label>
                  <input class="form-control" id="username" name="usernameText" type="text" placeholder="Masukkan User">
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