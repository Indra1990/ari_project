<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Privileges</li>
            <li class="breadcrumb-item active"><a href="{{ url('privileges/users') }}">User</a></li>

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
                <h3 class="card-title">Users</h3>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Last Login</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $idx => $user)
                        <tr>
                            <td>{{ $idx+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 'a')
                                    Admin
                                @else
                                    User
                                @endif
                            </td>
                            <td>
                                {{ date('Y-m-d H:i:s',strtotime($user->last_login)) }}
                            </td>
                            <td>
                                <a href="{{ url('privileges/users/update/'.$user->idusers) }}"><i class="fas fa-edit"></i></a>
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