<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{--  <h1>Fixed Footer Layout</h1>  --}}
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
                <h3 class="text-danger"><i class="fa fa-warning "></i> Access Denied</h3>
                <p><b>You do not have permission to access this page</b></p>
                <p><a href="{{url('/')}}">Back HOME</a></p>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <script type="text/JavaScript">
    redirectURL = "{{url('/')}}";
    setTimeout("location.href = redirectURL;", 10000);
  </script>