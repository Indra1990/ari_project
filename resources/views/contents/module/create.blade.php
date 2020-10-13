<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Module</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Privileges</li>
              <li class="breadcrumb-item acti   ve"><a href="{{ url('privileges/module') }}">Module</a></li>
              <li class="breadcrumb-item active">Create-new</li>

            </ol>
          </div><!-- /.col -->      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create</h3>
            </div>
            <div class="card-body">
                <form role="form" method="post" action="{{ url('privileges/module/create-new') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Code</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Application</label>
                        <input type="text" name="application" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Module</label>
                        <input type="text" name="module" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Action</label>
                        <input type="text" name="action" class="form-control" id="exampleInputEmail1">
                    </div>
                        
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>  
    
      </div>
    </section>
  </div>