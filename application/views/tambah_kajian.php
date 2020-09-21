  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Kajian</h3>
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
      <div class="col-md-8" >
        <form action=""  id="form-data" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Kajian</label>
              <input type="text" name="judul_kajian" class="form-control" id="exampleInputEmail1" placeholder="Judul Kajian" required="true">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Kajian</label>
              <textarea type="text" name="deskripsi_kajian" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi Kajian" required="true"></textarea> 
            </div>
             <div class="form-group">
              <label>Tanggal:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_kajian" class="form-control pull-right" id="datepicker" onchange="checkDate()" placeholder="Tanggal Kajian" required="true">
              </div>
            </div>
            <div class="form-group">
              <label>Waktu Kajian:</label>
                <div class="input-group">
                    <input type="text" name="waktu_kajian" class="form-control timepicker" placeholder="Waktu Kajian" required="true">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                  <!-- /.input group -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Pengisi Kajian</label>
              <input type="text" name="nama_ustadz" class="form-control" id="exampleInputPassword1" placeholder="Nama Pengisi Kajian" required="true">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Poster Kajian</label>
              <input type="file" name="poster_kajian" class="form-control" id="fileUpload" placeholder="Poster Kajian" required="true"><br>
              <span style="color:red"> Note: Please select only image file (eg: .png, .jpeg, .jpg, .gif etc)<br/> Max File size : 1MB allowed </span>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="submit" onclick="Upload()" class="btn btn-primary" value="true">Submit</button>
          </div>
        </form>
    </div>     
    </div>
           
  </div>
  <script type="text/javascript">
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
        if(this.files[0].size > 1000000){
           alert("Ukuran file terlalu besar!");
           this.value = "";
        };
    };
  </script>
  
    

         
