  <div class="box box-success box-solid">
    <div class="box-header with-border">    
      <h3 class="box-title">Update Audio Kajian</h3>
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
        <form action=""  id="form-data" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control" value="<?php echo $audio->id_audio; ?>" placeholder="Judul Kajian" required="true">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Audio Kajian</label>
              <input type="text" name="judul_audio" class="form-control" value="<?php echo $audio->judul_audio; ?>" placeholder="Judul Audio Kajian" required="true">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Audio Kajian</label>
              <input type="text" name="des_audio" class="form-control" value="<?php echo $audio->des_audio; ?>" placeholder="Deskripsi Audio Kajian" required="true">
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">Nama Ustadz</label>
              <input type="text" name="nama_ustadz" class="form-control" value="<?php echo $audio->nama_ustadz; ?>" placeholder="Nama Ustadz" required="true">
            </div>
            <div class="form-group">
              <label>Tanggal Audio  Kajian:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_audio" class="form-control pull-right" onchange="checkDate()" id="datepicker" value="<?php echo $audio->tgl_audio; ?>" placeholder="Tanggal Kajian" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">File Audio Kajian</label>
              <input type="file" name="file_audio" class="form-control" id="fileUpload" placeholder="File Audio Kajian">
               <input type="text" name="file_lama" class="form-control" value="<?php echo $audio->file_audio; ?>" readonly=""
              placeholder="Poster Kajian"><br>
              <span style="color:red"> Note: Please select only audio file (eg: .mp4.avi.mp3.3gp .mkv)<br/> Max File size : 5MB allowed </span>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>
          </div>
        </form>
        </div>      
    </div>            
  </div>  
  
  
  <script>
      function checkDate() {
       var selectedText = document.getElementById('datepicker').value;
       var selectedDate = new Date(selectedText);
       var now = new Date();
       if (selectedDate <= now) {
            alert("Tanggal Sudah Lewat");
            
   }
   var uploadField = document.getElementById("fileUpload");
        
            uploadField.onchange = function() {
                if(this.files[0].size > 5000000){
                   alert("Ukuran file terlalu besar!");
                   this.value = "";
                };
            };
 }
  </script>
