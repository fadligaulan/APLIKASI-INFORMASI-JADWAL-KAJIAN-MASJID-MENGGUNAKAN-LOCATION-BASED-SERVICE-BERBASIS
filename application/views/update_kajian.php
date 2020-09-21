  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Update Kajian</h3>
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
        <form action=""  id="kajian" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control" value="<?php echo $kajian->id_kajian; ?>" placeholder="Judul Kajian">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Kajian</label>
              <input name="judul_kajian" class="form-control" value="<?php echo $kajian->judul_kajian; ?>" placeholder="Judul Kajian">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Kajian</label>
              <input name="deskripsi_kajian" class="form-control" value="<?php echo $kajian->deskripsi_kajian; ?>" placeholder="Deskripsi Kajian">
            </div>
            <div class="form-group">
              <label>Tanggal Kajian:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_kajian" class="form-control pull-right" onchange="checkDate()" id="datepicker" value="<?php echo $kajian->tgl_kajian; ?>" placeholder="Tanggal Kajian">
              </div>
            </div>
            <div class="form-group">
              <label>Waktu Kajian:</label>
                <div class="input-group">
                    <input type="text" name="waktu_kajian" class="form-control timepicker" value="<?php echo $kajian->waktu_kajian; ?>" placeholder="Waktu Kajian">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                  <!-- /.input group -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Pengisi Kajian</label>
              <input name="nama_ustadz" class="form-control " value="<?php echo $kajian->nama_ustadz; ?>"placeholder="Nama Pengisi Kajian">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Poster Kajian</label>
              <input type="file" name="poster_kajian" class="form-control" id="fileUpload" placeholder="Poster Kajian">
              <input type="text" name="poster_lama" class="form-control" value="<?php echo $kajian->poster_kajian; ?>"
              placeholder="Poster Kajian"><br>
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

