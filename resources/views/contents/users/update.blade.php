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
            <li class="breadcrumb-item active">update</li>

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
                <h3 class="card-title">Update</h3>
            </div>
            <div class="card-body">
                <form role="form" method="post" action="{{ url('privileges/users/update/'.$users->idusers) }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $users->name }}">
                    </div>
                    <div class="form-group" >
                      
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                            <option value="0"> -- Select Role -- </option>
                            <option value="a" @if($users->role == 'a') selected @endif>Admin</option>
                            <option value="u" @if($users->role == 'u') selected @endif>User</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $users->email }}">
                    </div>
                        
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>  
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Privileges</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('privileges/users/save-privileges/'.$users->idusers) }}" method="POST">
                @csrf
                <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td width="20%"></td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="header">
                            <label class="form-check-label" for="header">
                            <small>All</small>
                            </label>
                          </div>
                        </td>
                      </tr>
                      @php
                      $allcheck = [];
                  @endphp
                        @foreach ($access as $idx => $item)   
                            @foreach ($item as $acc => $val)
                                <tr>
                                    <td width="20%">{{ $acc }}</td>
                                    <td>
                                   
                                        @foreach ($val as $arr => $acc)
                                        @php
                                        $allcheck[] = $acc['code']; 
                                        @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="{{ $acc['code'] }}" id="defaultCheck_{{ $acc['code'] }}"  @if($acc['access']) checked @endif>
                                            <label class="form-check-label" for="defaultCheck_{{ $acc['code'] }}">
                                            {{ $arr }} <small>({{ $acc['code'] }})</small>
                                            </label>
                                          </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach     
                        @endforeach
                    </tbody>
                  </table>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                  </form>
            </div>
        </div>
    </div>
</section>

</div>

<script>
  var databp = {!!json_encode($allcheck)!!};
console.log(databp)

$('#header').click(function(){
  if(this.checked == true){
    databp.forEach((element) => {
      $('#defaultCheck_'+element).prop('checked',true)
    })
  }else{
    databp.forEach((element) => {
      $('#defaultCheck_'+element).prop('checked',false)
    })
  }

 
});



</script>