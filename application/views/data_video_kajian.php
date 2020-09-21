  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Data Video Kajian</h3>
            
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
              <li class="active"><a href="#activity" data-toggle="tab">Data Video Kajian</a></li>
              <li><a href="#timeline" data-toggle="tab">Detail Video Kajian</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body table-responsive">
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Judul Video</center></th>
                            <th><center>Deskripsi Video</center></th>
                            <th><center>Nama Ustadz</center></th>
                            <th><center>Tanggal Video</center></th>
                            <th><center>URL Video</center></th>
                            <th><center>Aksi</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0; foreach($video as $row): ?>
                          <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row->judul_video; ?></td>
                            <td><?php echo $row->des_video; ?></td>
                            <td><?php echo $row->nama_ustadz; ?></td>
                            <td><?php echo $row->tgl_video; ?></td>
                            <td><?php echo $row->url_video; ?></td>
                            <td><center>
                              <a href="<?php echo site_url('video-kajian/delete/'. $row->id_video); ?>" class="btn btn-app"><i class="fa fa-trash"></i>Delete</a>
                              <a href="<?php echo site_url('video-kajian/update/'. $row->id_video); ?>" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a>
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
                    <?php $no = 0; foreach($video as $row): ?>
                    <div class="col-md-3">
                      <div class="box box-success box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Video Kajian :</h3>
                          <?php echo ++$no; ?>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <ul class="nav nav-stacked">
                            <li><iframe width="260" height="140" frameborder="0" controls="controls" autoplay="0" src="<?php echo base_url('assets/video/file/'.$row->url_video) ?>"></iframe></li>
                            <li><a href="" >Judul Video :<?php echo $row->judul_video; ?></a></li>
                            <li><a href="">Nama Ustadz :<?php echo $row->nama_ustadz; ?></a></li>
                            <li><a href="">Tanggal :<?php echo $row->tgl_video; ?></a></li>
                            <li><a href="">Deskripsi Video:<?php echo $row->des_video; ?></a></li>
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

              <div class="tab-pane" id="settings">
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
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
      </div>
    </div>            
  </div>
          







          