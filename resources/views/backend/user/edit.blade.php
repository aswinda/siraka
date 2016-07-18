@extends('backend.base.template')
@section('content')

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Add User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ url('admin/user/update/'.$user->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body">
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="email" class="form-control" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" type="text" class="form-control" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <select name="gender" class="form-control">
                          <option value="Male" <?php if($user->gender == "Male") echo 'selected'; ?> >Male</option>
                          <option value="Female" <?php if($user->gender == "Female") echo 'selected'; ?>>Female</option>
                          <option value="Other" <?php if($user->gender == "Other") echo 'selected'; ?>>Other</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" type="text" class="form-control" placeholder="{{ $user->address }}" value="{{ $user->address }}">
                    </div>
                    <div class="form-group">
                      <label>Group</label>
                      <select name="group" class="form-control">
                          <option value="1" <?php if($user->group_id == 1) echo 'selected'; ?>>Admin</option>
                          <option value="2" <?php if($user->group_id == 2) echo 'selected'; ?>>Customer</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Password confirmation</label>
                      <input name="password-confirmation" type="password" class="form-control">
                    </div>

                    <div class="box-footer">
                      <ul class="mailbox-attachments clearfix">
                        <li>
                          <span class="mailbox-attachment-icon has-img"><img src="{{ URL::to('images/profiles/'.$user->photo) }}" alt="Attachment"/></span>
                          <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> {{ $user->name }}</a>
                           
                          </div>
                        </li>
                      </ul>
                    </div><!-- /.box-footer -->
                    
                    
                    <div class="form-group">
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Image
                        <input name="file" type="file"/>
                      </div> 
                      <p class="help-block">Max. 32MB</p>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->


            </div><!--/.col (left) -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::to('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::to('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::to('dist/js/demo.js') }}" type="text/javascript"></script>

    @endsection