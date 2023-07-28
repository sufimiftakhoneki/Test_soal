
			
			<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Pegawai</h1>
      </div>
  </div>

<?php 
  $data=$this->session->flashdata('sukses');
  if($data!=""){ ?>
  <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
  <?php } ?>

  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Tambah URL </button>
		   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambahdata"><i class="fa fa-plus-circle"></i> Tambah Data </button>


          <hr>

          <div class="panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-table"></i> List Data
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
                      </thead>
                      <tbody>
                          <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?= $employee->id; ?></td>
                <td><?= $employee->nama; ?></td>
                <td><?= $employee->jabatan; ?></td>
                <td><?= $employee->jenis_kelamin; ?></td>
                <td><?= $employee->alamat; ?></td>
                <td>
                  <center>
                                    <div class="tooltip-demo">
                                      <a data-toggle="modal" data-target="#modal-edit<?=$employee->id;?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                      <a href="<?php echo site_url('employees/delete_employee/'.$employee->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$employee->nama;?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                    </div>
                                  </center>
                </td>
            </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>


<div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Employees/save_from_json'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ambil Data JSON</h4>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label class='col-md-3'>URL</label>
            <div class='col-md-9'><input type="text" name="url" autocomplete="off" required placeholder="Masukkan URL" class="form-control" ></div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
          </div>
        </form>
    </div>
</div>    
</div>
<!-- /#page-wrapper -->


<div id="modal-tambahdata" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Employees/save_employee'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label class='col-md-3'>Nama</label>
            <div class='col-md-9'><input type="text" name="nama" autocomplete="off" required placeholder="Masukkan Nama" class="form-control" ></div>
          </div>
          <br>
		  <div class="form-group">
            <label class='col-md-3'>Jabatan</label>
            <div class='col-md-9'><input type="text" name="jabatan" autocomplete="off" required placeholder="Masukkan Jabatan" class="form-control" ></div>
          </div>
          <br>
		  <div class="form-group">
            <label class='col-md-3'>Jenis Kelamin</label>
            <div class='col-md-9'><input type="text" name="jenis_kelamin" autocomplete="off" required placeholder="Masukkan Jenis Kelamin" class="form-control" ></div>
          </div>
          <br>
		  <div class="form-group">
            <label class='col-md-3'>Alamat</label>
            <div class='col-md-9'><input type="text" name="alamat" autocomplete="off" required placeholder="Masukkan Alamat" class="form-control" ></div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
          </div>
        </form>
    </div>
</div>    
</div>


<?php $no=0; foreach($employees as $employee): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$employee->id;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('employees/update_employee/'.$employee->id); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$employee->id;?>" name="id" class="form-control" >

          <div class="form-group">
            <label class='col-md-3'>Nama</label>
            <div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$employee->nama;?>" required placeholder="Masukkan Nama" class="form-control" ></div>
          </div>
		     <br>
		   <div class="form-group">
            <label class='col-md-3'>Jabatan</label>
            <div class='col-md-9'><input type="text" name="jabatan" autocomplete="off" value="<?=$employee->jabatan;?>" required placeholder="Masukkan Jabatan" class="form-control" ></div>
          </div>
		     <br>
		   <div class="form-group">
            <label class='col-md-3'>Jenis Kelamin</label>
            <div class='col-md-9'><input type="text" name="jenis_kelamin" autocomplete="off" value="<?=$employee->jenis_kelamin;?>" required placeholder="Masukkan Jenis Kelamin" class="form-control" ></div>
          </div>
		     <br>
		   <div class="form-group">
            <label class='col-md-3'>Alamat</label>
            <div class='col-md-9'><input type="text" name="alamat" autocomplete="off" value="<?=$employee->alamat;?>" required placeholder="Masukkan Alamat" class="form-control" ></div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>