  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Update Takmir</h3>
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
              <input type="hidden" name="id" class="form-control" value="<?php echo $takmir->id_takmir; ?>" placeholder="Judul Takmir">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Takmir</label>
              <input name="nama_takmir" class="form-control" value="<?php echo $takmir->nama_takmir; ?>" placeholder="Judul Takmir">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kontak Takmir</label>
              <input name="no_hp" class="form-control" value="<?php echo $takmir->no_hp; ?>" placeholder="Deskripsi Takmir">
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input name="alamat" class="form-control" value="<?php echo $takmir->alamat; ?>" placeholder="Tanggal Takmir">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input name="username" class="form-control" value="<?php echo $takmir->username; ?>" placeholder="Waktu Takmir">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="pwd" class="form-control " value="<?php echo $takmir->pwd; ?>"placeholder="Nama Pengisi Takmir">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Foto Takmir</label>
              <input type="file" name="foto_takmir" class="form-control" id="fileUpload" placeholder="Poster Takmir">
              <input type="text" name="foto_lama" class="form-control" value="<?php echo $takmir->foto_takmir; ?>"
              placeholder="Poster Takmir"><br>
              <span style="color:red"> Note: Please select only image file (eg: .png, .jpeg, .jpg, .gif etc)<br/> Max File size : 1MB allowed </span>
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

