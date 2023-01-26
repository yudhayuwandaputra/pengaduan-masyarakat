<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th width="1%">No</th>
                             <th width="1%">Id Tanggapan</th>
                             <th width="1%">Id Pengaduan</th>
                             <th>Tanggal</th>
                             <th>Isi Tanggapan</th>
                             <th width="1%">Petugas</th>
                             <th width="1%">Opsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($tanggapan as $all) : ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $all->id_tanggapan; ?></td>
                                 <td><?= $all->id_pengaduan; ?></td>
                                 <td><?= $all->tgl_tanggapan; ?></td>
                                 <td><?= $all->tanggapan; ?></td>
                                 <td><?= $all->petugas; ?></td>
                                 <td>
                                     <div class="btn-group">
                                     <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="index.php/admin/hapus_laporan/" data-refresh="/admin/data_pengaduan/" 
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
