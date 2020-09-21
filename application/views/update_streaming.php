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
              <input type="hidden" name="id" class="form-control" value="<?php echo $streaming->id_streaming; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Streaming</label>
              <input type="text" name="judul_streaming" class="form-control" value="<?php echo $streaming->judul_streaming; ?>" placeholder="Judul Streaming">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi Streaming</label>
              <input type="text" name="des_streaming" class="form-control" value="<?php echo $streaming->des_streaming; ?>" placeholder="Deskripsi Streaming">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Ustadz</label>
              <input type="text" name="nama_ustadz" class="form-control" value="<?php echo $streaming->nama_ustadz; ?>" placeholder="Nama Ustadz">
            </div>
            <div class="form-group">
              <label>Tanggal Kajian:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_streaming" class="form-control pull-right" onchange="checkDate()" id="datepicker" value="<?php echo $streaming->tgl_streaming; ?>" placeholder="Tanggal Kajian">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">URL Streaming</label>
              <input type="text" name="url_streaming" class="form-control" value="<?php echo $streaming->url_streaming; ?>" placeholder="URL Streaming">
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
  </script>
