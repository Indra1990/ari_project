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
            <li class="breadcrumb-item active">Create New</li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

        {{--  <div class="row">
            <div class="col-12">
                <div>
                    <button type="button" id="addrow" class="btn btn-xs btn-secondary"><i class="fas fa-plus size:2x"></i> Add Materi</button>
                </div>
            </div>
        </div>  --}}
        <br>

        <form action="{{ url('class/create-new') }}" role="form" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-12">
                @include('contents.allmessage')
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                            Create
                          </h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Categories</label>
                          <div class="col-sm-10">
                            <select name="" id="select2" class="form-control">
                              <option value=""> -- select categories -- </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Tutor</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="tutor" placeholder="Tutor">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="description"  cols="30" rows="10"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Images</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="images">
                            <small class="help-block">Extension must jpg, jpeg, png</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label">Demo</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="demo">
                            <small class="help-block">Extension must MP4</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name_materi" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <a href="{{ url('class') }}" class="btn btn-default" >Cancel </a>
                            <div class="float-right">
                              <input type="submit" class="btn btn-success" value="Save">
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>  
              </div>
          </div>
        </form>
        
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
    {{--  $('#addrow').on('click',function(){
      var ais = $('#appendindex').val();
      $('#appendindex').val(parseInt(ais)+1);

      $('#count').append('<div class="container-fluid">'
            +'<div class="row" id="row_'+ais+'">'
              +'<div class="col-12">'
                +'<div class="card">'
                  +'<div class="card-header">'
                    +'<h3 class="card-title">Materi</h3>'
                  +'</div>'
                  +'<div class="card-body">'
                    +'<div class="form-group row">'
                     +'<label for="name_materi" class="col-sm-2 col-form-label">Name</label>'
                      +'<div class="col-sm-10">'
                        +'<input type="text" class="form-control" name="name_materi[]" id="name_materi_'+ais+'" placeholder="Name Materi">'
                      +'</div>'
                    +'</div>'
                    +'<div class="form-group row">'
                      +'<label class="col-sm-2 col-form-label"></label>'
                      +'<div class="col-sm-10">'
                        +'<button type="button" id="addrowsub_'+ais+'" class="btn btn-xs btn-secondary"><i class="fas fa-plus size:2x"></i> Add Sub Materi</button>'
                      +'</div>'
                    +'</div>'
                  +'</div>'
                +'</div>'  
              +'</div>'    
            +'</div>'
          +'</div>'
        )
        sub_materi(ais);
    });
    
    function sub_materi(ais){
      $('#table_'+ais+'').append('<tr>'
        +'<td>'
          +'dsdsfsdf'
        +'</td>'    
      +'</tr>');
      console.log(ais)
    }  --}}
</script>