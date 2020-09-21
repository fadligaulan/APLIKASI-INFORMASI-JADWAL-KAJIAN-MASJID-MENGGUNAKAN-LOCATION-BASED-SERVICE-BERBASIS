  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Update Masjid</h3>
       <?php if($message = $this->session->flashdata('message')): ?>
      <div class="box-body">
        <div class="alert alert-dismissible alert-<?php echo ($message['status']) ? 'success' : 'danger'; ?>"><?php echo $message['message']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
      </div>
      <?php endif; ?>        
    </div>
    <div class="box-body">
    <div class="col-md-6" >
        <form action=""  id="masjid" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control" value="<?php echo $masjid->id_masjid; ?>" placeholder="Judul Masjid">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Masjid</label>
              <input name="nama_masjid" class="form-control" value="<?php echo $masjid->nama_masjid; ?>" placeholder="Nama Masjid">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input name="alamat_masjid" class="form-control" value="<?php echo $masjid->alamat_masjid; ?>" placeholder="Nama Masjid">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Latitude</label>
              <input name="lat" class="form-control" value="<?php echo $masjid->lat; ?>" placeholder="Latitude" readonly="yes">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Longitude</label>
              <input name="lng" class="form-control" value="<?php echo $masjid->lng; ?>" placeholder="Longitude" readonly="yes">
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Masjid</label>
              <input name="des_masjid" class="form-control" value="<?php echo $masjid->des_masjid; ?>" placeholder="Deskripsi Masjid">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kontak Masjid</label>
              <input name="contact_masjid" class="form-control" value="<?php echo $masjid->contact_masjid; ?>" placeholder="Kontak Masjid">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Foto Masjid</label>
              <input type="file" name="foto_masjid" class="form-control" id="fileUpload" placeholder="Poster Masjid">
              <input type="text" name="foto_lama" class="form-control" value="<?php echo $masjid->foto_masjid; ?>"
              placeholder="Foto Masjid"><br>
               <span style="color:red"> Note: Please select only image file (eg: .png, .jpeg, .jpg, .gif etc)<br/> Max File size : 1MB allowed </span>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tahun Berdiri Masjid</label>
              <input name="thn_berdiri" class="form-control " value="<?php echo $masjid->thn_berdiri; ?>"placeholder="Tahun Berdiri">
            </div>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>
          </div>
        </form>
      
      <!-- /.box -->
    </div>              
    </div>           
  </div>
  
  <script>
     
 
 var uploadField = document.getElementById("fileUpload");

    uploadField.onchange = function() {
        if(this.files[0].size > 1000000){
           alert("Ukuran file terlalu besar!");
           this.value = "";
        };
    };
  </script>

