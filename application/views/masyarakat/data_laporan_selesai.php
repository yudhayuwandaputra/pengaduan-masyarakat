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
         <a href="<?= base_url() ?>masyarakat/cetak_semua_laporan" class="btn btn-primary" target="_BLANK"><i class="fa fa-print"></i></button></a>
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
                            foreach ($pengaduan_selesai as $all) :
                            
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
                                     <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="index.php/admin/hapus_laporan/" data-refresh="/masyarakat/data_laporan_selesai/" 
                                     onclick="deleteLaporan(<?= $all->id_pengaduan ?>)"><i class="fa fa-trash"></i></button>
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



<!-- Modal Detail -->
<?php foreach($pengaduan_selesai as $all):?>
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

    <div class="modal-dialog modal-l" role="document">
      <div class="modal-content">
      
        <span class="badge badge-warning">Tanggapan</span>
        <p><?= $all->tanggapan ?></p>
           <div class="modal-header">
       </div>
     </div>
    </div>
 

      </div>
    </div>
  </div>
</div>
<center><h6>Ditanggapi Oleh :  <span class="badge badge-info"><?= $this->session->userdata('nama'); ?></span><h6><center>
</div>
    </div>
  </div>
 </div>
 <?php endforeach?>