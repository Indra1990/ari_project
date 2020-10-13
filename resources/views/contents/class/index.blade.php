<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Class</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Class</li>
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
                <h3 class="card-title">Index</h3>
                <div class="float-right"><i class="fas fa-plus size:2x"></i> <a href="{{ url('class/create-new') }}">Create New</a></div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          {{--  <th>Email</th>
                          <th>Role</th>
                          <th>Last Login</th>  --}}
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $idx => $class)
                        <tr>
                            <td>{{ $idx+1 }}</td>
                            <td>{{ $class->name }}</td>
                            {{--  <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 'a')
                                    Admin
                                @else
                                    User
                                @endif
                            </td>
                            <td>
                                {{ date('Y-m-d H:i:s',strtotime($user->last_login)) }}
                            </td>--}} 
                             <td>
                                <a href="{{ url('class/detail/'.$class->idclass) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ url('class/update/'.$class->idclass) }}"><i class="fas fa-edit"></i></a>

                            </td>   
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
  
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>