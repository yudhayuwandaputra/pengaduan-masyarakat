<?php if ($this->session->flashdata('msg')) : ?>
    <?= $this->session->flashdata('msg'); ?>
<?php endif ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square"></i> Tambah</button>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th width="1%">No</th>
                             <th>Judul</th>
                             <th>Tanggal</th>
                             <th>Isi Laporan</th>
                             <th width="5%">Foto</th>
                             <th width="1%">Status</th>
                             <th width="1%">Opsi</th>
                         </tr>
                     </thead>
                     <tbody>
                     
                         <?php $no = 1;
                            foreach ($laporan as $all) :
                            
                             ?>
                             <tr>
                                 <td><?= $no++; ?></td>
                                 <td><?= $all->judul; ?></td>
                                 <td><?= $all->tgl_pengaduan; ?></td>
                                 <td><?= $all->isi_laporan; ?></td>
                                <td> <img src="<?=base_url('file/images/'.$all->foto)?>" style="width:60px; height:5"></td>
                                 <td>
                                     <?php
                                        if ($all->status == "proses") { ?>
                                         <button id="proses" class="btn btn-danger btn-sm" disabled>Proses</button>
                                     <?php  } else { ?>
                                         <button id="selesai" class="btn btn-success btn-sm" disabled>Selesai</button>
                                     <?php } ?>
                                 </td>
                                 <td>
                                     <div class="btn-group">
                                     <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="index.php/admin/hapus_laporan/" data-refresh="/masyarakat/data_laporan_proses/" 
                                     onclick="deleteLaporan(<?= $all->id_pengaduan ?>)"><i class="fa fa-trash"></i></button>
                                     <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edt<?= $all->id_pengaduan ?>"><i class="fa fa-edit"></i></button>
                                     <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tampil<?= $all->id_pengaduan ?>"><i class="fa fa-indent"></i></button>   
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
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form class="user" action="<?= base_url(); ?>masyarakat/tambah_laporan" method="post" enctype="multipart/form-data">
                     <label class="col-form-label-sm mb-0">
                         <p>Isi Data Dengan Benar!</p>
                     </label>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Judul</label>
                                 <div class="col-sm-9">
                                     <input type="text" name="judul" class="form-control form-control-sm" />
                                </div>
                             </div>
                         </div>
                        
                        
                     
                     
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Tanggal</label>
                                 <div class="col-sm-9">
                                     <input type="text" name="tanggal" class="form-control form-control-sm" readonly value='<?=date('yy-m-d')?>' />
                                 </div>
                             </div>
                         </div>
                     

                
                        <input type="hidden"  name="nik" value="<?php echo $this->session->userdata("nik")  ?>" required>
             

                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Isi</label>
                                 <div class="col-sm-9">
                                     <textarea name="isi" class="form-control form-control-sm"></textarea>
                                </div>
                             </div>
                         </div>

                         
                         <input class="form-control form-control-sm" value="proses" type="hidden"  name="status" />
                        
                         <div class="col-md-6">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Foto</label>
                                 <div class="col-sm-9">
             
                                     <input type="file" name="foto" class="form-control form-control-sm" />
                                     <p>*Max 1MB</p>
     
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
 </div>

<!-- Modal Edit -->
<?php foreach($laporan as $all):?>
<div class="modal fade" id="edt<?=$all->id_pengaduan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="user" action="<?= base_url('masyarakat/edit_laporan?id='.$all->id_pengaduan); ?>" method="post">
                    
                        <div class="col-md-10">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Judul</label>
                                 <div class="col-sm-9">
                                     <input type="text" name="judul" value="<?= $all->judul ?>" class="form-control form-control-sm" />
                                </div>
                             </div>
                         </div>
                        
                     
                        


                         <div class="col-md-10">
                             <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Isi</label>
                                 <div class="col-sm-9">
                                     <textarea name="isi" class="form-control form-control-sm"><?= $all->isi_laporan ?></textarea>
                                </div>
                             </div>
                         </div>
                              <br>
                              <br>
               
                        <div class="float-right">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                 <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

 <?php endforeach?>
 </div>


<!-- Modal Detail -->
<?php foreach($laporan as $all):?>
 <div class="modal fade" id="tampil<?=$all->id_pengaduan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card mb-3" style="max-width: 600px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?=base_url('file/images/'.$all->foto)?>" class="card-img" alt="...">
      <br>
      <br>
      
      <center><h6 class="card-title"><?= $all->tgl_pengaduan ?></h6></center>
      <?php
            if ($all->status == "proses") { ?>
            <center><span id="proses" class="badge badge-danger" disabled>Proses</span></center>
        <?php  } else { ?>
            <center><span id="selesai" class="badge badge-success" disabled>Selesai</button></center>
        <?php } ?>




    </td>
    </div>
    <div class="col-md-8">
      <div class="card-body">
       <center> <h4 class="card-title"><?= $all->judul ?></h4></center>
       <center> <h7 class="card-title"><?= $all->nik ?></h7></center>



    <div class="modal-dialog modal-l" role="document">
      <div class="modal-content">
        <span class="badge badge-info">Laporan</span>
           <div class="modal-header">
         <p><?= $all->isi_laporan ?></p>
       </div>
     </div>
    </div>


       </div>
    
     </div>
    </div>
 

      </div>
    </div>
  </div>
</div>

    </div>
  </div>
 </div>
 <?php endforeach?>