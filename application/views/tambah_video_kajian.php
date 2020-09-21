  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Video Kajian</h3>
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
              <label for="exampleInputEmail1">Judul Video Kajian</label>
              <input type="text" name="judul_video" class="form-control" id="exampleInputEmail1" placeholder="Judul Video Kajian" required="true">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Video Kajian</label>
              <textarea type="text" name="des_video" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi Video Kajian" required="true"></textarea> 
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">Nama Ustadz</label>
              <input type="text" name="nama_ustadz" class="form-control" id="exampleInputPassword1" placeholder="Nama Ustadz" required="true">
            </div>
            <div class="form-group">
              <label>Tanggal:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_video" class="form-control pull-right" onchange="checkDate()" id="datepicker" placeholder="Tanggal Kajian" required="true">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">File Video Kajian</label>
              <input type="file" name="file_video" class="form-control" id="fileUpload" placeholder="File Video Kajian" required="true"><br>
              <span style="color:red"> Note: Please select only video file (eg: .mp4.avi.mp3.3gp .mkv)<br/> Max File size : 10MB allowed </span>
            </div>
          </div>
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
     }
     var uploadField = document.getElementById("fileUpload");
    
        uploadField.onchange = function() {
            if(this.files[0].size > 10000000){
               alert("Ukuran file terlalu besar!");
               this.value = "";
            };
        };
  </script>
          
