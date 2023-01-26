<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Data Laporan Selesai</h1>
     <br>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">

     <div class="card-header py-3">

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
                             <th>Telepon</th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($masyarakat as $all) : ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $all->nik ?></td>
                                 <td><?= $all->nama; ?></td>
                                 <td><?= $all->username; ?></td>
                                 <td><?= $all->telp; ?></td>
            
                             </tr>
                         <?php endforeach ?>
                     </tbody>
                                
                 </table>
             </div>
         </div>
     </div>
 </div>





         <script>
	window.print();
</script>