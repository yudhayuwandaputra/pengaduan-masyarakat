<div class="flash-data" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Data Masyarakat</h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
     <div class="card-header py-3">
     <a href="<?= base_url() ?>admin/cetak_masyarakat" class="btn btn-primary" target="_BLANK"><i class="fa fa-print"></i></button></a>
             <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i><i class="fas fa-plus-square"></i> Tambah</i></button>
         </div>
        
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th width="1%">No</th>
                             <th width="4%">Nik</th>
                             <th>Nama</th>
                             <th>Username</th>
                             <th>Password</th>
                             <th>Telepon</th>
                             <th width="1%">Opsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($masyarakat as $all) : ?>
                             <tr>
                             
                                 <td><?= $no++ ?></td>
                                 <td><?= $all->nik; ?></td>
                                 <td><?= $all->nama; ?></td>
                                 <td><?= $all->username; ?></td>
                                 <td><?= $all->password; ?></td>
                                 <td><?= $all->telp; ?></td>
            
                                 <td>
                                     <div class="btn-group">
                                     <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="index.php/admin/hapus_user/" data-refresh="/admin/data_masyarakat/" 
                                     onclick="deleteUser(<?= $all->nik ?>)"><i class="fa fa-trash"></i></button>
                                     <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edt<?= $all->nik ?>"><i class="fa fa-edit"></i></button>
                                        
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form class="user" action="<?= base_url(); ?>admin/tambah_masyarakat" method="post">
                     <label class="col-form-label-sm mb-0">
                         <p>Isi Data Dengan Benar!</p>
                     </label>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Nik</label>
                                 <div class="col-sm-7">
                                     <input type="number" name="nik"  class="form-control form-control-sm" />
                                </div>
                             </div>
                         </div>
                        
                     
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Nama</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="nama" class="form-control form-control-sm" />
                                 </div>
                             </div>
                         </div>
             

                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Username</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="username" class="form-control form-control-sm" />
                                </div>
                             </div>
                            </div>

                            
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Password</label>
                                 <div class="col-sm-7">
                                     <input type="password" name="password" class="form-control form-control-sm" />
                                </div>
                             </div>
                            </div>
                        
                        
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Telepon</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="telp" class="form-control form-control-sm" />
                                </div>
                             </div>
                         </div>
                     </div>
                <div class="float-right">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                 <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
         </div>
     

 <!-- Modal Edit -->
 <?php foreach($masyarakat as $all):?>
<div class="modal fade" id="edt<?=$all->nik?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="user" action="<?= base_url('admin/edit_user?nik='.$all->nik); ?>" method="post">
      <label class="col-form-label-sm mb-0">
                         <p>Isi Data Dengan Benar!</p>
                     </label>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Nik</label>
                                 <div class="col-sm-7">
                                     <input type="number" name="nik" value="<?= $all->nik ?>" class="form-control form-control-sm" />
                                </div>
                             </div>
                         </div>
                        
                     
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Nama</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="nama" value="<?= $all->nama ?>" class="form-control form-control-sm" />
                                 </div>
                             </div>
                         </div>
             

                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Username</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="username" value="<?= $all->username ?>" class="form-control form-control-sm" />
                                </div>
                             </div>
                            </div>

                            
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Password</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="password" value="<?= $all->password ?>" class="form-control form-control-sm" />
                                </div>
                             </div>
                            </div>
                        
                        
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Telepon</label>
                                 <div class="col-sm-7">
                                     <input type="text" name="telp" value="<?= $all->telp ?>" class="form-control form-control-sm" />
                                </div>
                             </div>
                         </div>
                     </div>
                <div class="float-right">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                 <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
         </div>
     </div>


      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>
 </div>



 <!-- End of Main Content -->
 