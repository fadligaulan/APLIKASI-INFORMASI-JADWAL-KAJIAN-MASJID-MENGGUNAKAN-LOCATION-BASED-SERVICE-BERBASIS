<div class="box">
  <div class="box-header">
    <div class="box-title">
        <h3 class="box-title">Data Kajian</h3>
     </div>      
      <?php if($message = $this->session->flashdata('message')): ?>
        <div class="alert alert-dismissible alert-<?php echo ($message['status']) ? 'success' : 'danger'; ?>"><?php echo $message['message']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>    
      <?php endif; ?>  
  </div>
  <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Judul Kajian</center></th>
            <th><center>Deskripsi Kajian</center></th>
            <th><center>Tanggal Kajian</center></th>
            <th><center>Waktu Kajian</center></th>
            <th><center>Pengisi Kajian</center></th>
            <th><center>Poster Kajian</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; foreach($kajian as $row): ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td><?php echo $row->judul_kajian; ?></td>
            <td><?php echo $row->deskripsi_kajian; ?></td>
            <td><?php echo $row->tgl_kajian; ?></td>
            <td><?php echo $row->waktu_kajian; ?></td>
            <td><?php echo $row->nama_ustadz; ?></td>
            <td><?php echo $row->poster_kajian; ?></td>
            <td><center>
              <a href="<?php echo site_url('kajian/delete/'. $row->id_kajian); ?>" class="btn btn-app"><i class="fa fa-trash"></i>Delete</a>
              <a href="<?php echo site_url('kajian/update/'. $row->id_kajian); ?>" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a>
                </center>
            </td> 
          </tr>
          <?php endforeach; ?>         
        </tbody>
      </table>
    </div>
  <!-- /.box-body -->
</div>






          