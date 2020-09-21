<div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Data Masjid</h3>
       
              
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
      <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profil Masjid</a></li>
              <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <?php foreach($masjid as $row): ?>
                <form action="<?php echo site_url('masjid/update/'. $row->id_masjid); ?>"  id="masjid" method="post" >
               <!--  <div class="box-body">
                  <table>
                      <tr>
                        <td width="20%">Nama Masjid</td>
                        <td width="50%"><?php echo $row->nama_masjid; ?></td>
                        <td width="30%" rowspan="5" style="vertical-align: top;"><img src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" width="50%"><td>
                      </tr>
                      <tr>
                        <td>Alamat Masjid</td>
                        
                        <td><?php echo $row->alamat_masjid; ?></td>
                      </tr>
                      <tr>
                        <td>Deskripsi Masjid</td>
                        
                        <td><?php echo $row->des_masjid; ?></td>
                      </tr>
                      <tr>
                        <td>Contact Masjid</td>
                        
                        <td><?php echo $row->contact_masjid; ?></td>
                      </tr>
                      <tr>
                        <td>Tahun Berdiri</td>
                        
                        <td><?php echo $row->thn_berdiri; ?></td>
                      </tr>
                      <tr>
                        <td><button type="submit" value="true" class="btn btn-success">Edit Data Masjid</button></td>
                      </tr>
                  </table>
                </div> -->
                 <div class="row">
                  <div class="col-md-12">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                      <div class="box-header with-border">
                        <div class="user-block">
                          <img class="img-circle" src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="User Image">
                          <span class="username"><a href="#"><?php echo $row->nama_masjid; ?></a></span>
                          <span class="description"><?php echo $row->alamat_masjid; ?></span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                          <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                            <i class="fa fa-circle-o"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <img class="img-responsive pad" src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="Photo">

                        
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="User Image">

                          <div class="comment-text">
                                <span class="username">
                                  Deskripsi Masjid
                                 
                                </span><!-- /.username -->
                            <?php echo $row->des_masjid; ?>
                          </div>
                          <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="User Image">

                          <div class="comment-text">
                                <span class="username">
                                  Contact Masjid
                                 
                                </span><!-- /.username -->
                            <?php echo $row->contact_masjid; ?>
                          </div>
                          <!-- /.comment-text -->
                        </div>

                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="User Image">

                          <div class="comment-text">
                                <span class="username">
                                  Tahun Berdiri
                                 
                                </span><!-- /.username -->
                           <?php echo $row->thn_berdiri; ?>
                          </div>
                          <!-- /.comment-text -->
                        </div>

                        <div class="box-comment">
                          <!-- User image -->
                          
                          <div class="comment-text">
                                <span class="username">
                                  <button type="submit" value="true" class="btn btn-success">Edit Data Masjid</button>
                                 
                                </span><!-- /.username -->
                           
                          </div>
                          <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                      </div>
                      <!-- /.box-footer -->
                      
                      <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                  </div>
                </div>
                </form>
                <?php endforeach; ?>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
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



  
          







          

