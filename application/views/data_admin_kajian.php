  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Data Jadwal Kajian</h3>
       
              
    </div><br>
    <div class="col-md-11">
    <?php if($message = $this->session->flashdata('message')): ?>
        <div class="alert alert-dismissible alert-<?php echo ($message['status']) ? 'success' : 'danger'; ?>"><?php echo $message['message']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>    
      <?php endif; ?><br>
    </div>
    <div class="box-body">
      <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data Kajian</a></li>
              <li><a href="#timeline" data-toggle="tab">Detail Kajian</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body table-responsive">
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Nama Takmir</center></th>
                            <th><center>Nama Masjid</center></th>
                            <th><center>Jumlah Kajian</center></th>
                            <th><center>Jumlah Audio</center></th>
                            <th><center>Jumlah Video</center></th>
                            <th><center>Jumlah Streaming</center></th>
                            <th><center>Aksi</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0; foreach($data_takmir as $row): ?>
                          <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->nama_takmir; ?></td>
                            <td><?php echo $row->id_masjid; ?><?php echo $row->nama_masjid; ?></td>
                            <td><?php echo $row->jumlah_kajian; ?></td>
                            <td><?php echo $row->jumlah_audio; ?></td>
                            <td><?php echo $row->jumlah_video; ?></td>
                            <td><?php echo $row->jumlah_streaming; ?></td>
                            <td><center>
                              <a href="<?php echo site_url('kajian/delete/'. $row->id_kajian); ?>" class="btn btn-danger-btn-sm"><i class="fa fa-trash"></i>Delete</a>
                              <a href="<?php echo site_url('kajian/update/'. $row->id_kajian); ?>" class="btn btn-warning-btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                </center>
                            </td> 
                          </tr>
                          <?php endforeach; ?>         
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="box-body">
                  <div class="row">
                    <?php $no = 0; foreach($kajian as $row): ?>
                    <div class="col-md-3">
                      <div class="box box-success box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Kajian :</h3>
                          <?php echo ++$no; ?>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <ul class="nav nav-stacked">
                            <li><img src="<?php echo base_url('assets/images/poster/'.$row->poster_kajian) ?>" width="200" high="50"></li>
                            <li><a href="" >Judul Kajian :<?php echo $row->judul_kajian; ?></a></li>
                            <li><a href="">Pengisi Kajian :<?php echo $row->nama_ustadz; ?></a></li>
                            <li><a href="">Tanggal & Waktu:<?php echo $row->tgl_kajian; ?> <?php echo $row->waktu_kajian; ?></a></li>
                          </ul>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

              <!-- <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
      </div>
    </div>
  </div>
          
   

          




          