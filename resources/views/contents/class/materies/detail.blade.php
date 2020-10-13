<div class="modal fade" id="view-materies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('class/detail/'.$class->idclass.'/create-subclass') }}" role="form" method="post">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">View Materies</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">   
            <div class="table-responsive">
                <table id="table-view-materies" class="table table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Name Materi</th>  
                          <th>Video 480</th>
                          <th>Video 720</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  <tr id="tr-view-show">
                           
                        </tr>  --}}
                        <div id="tr-view-show">

                        </div>
                    </tbody>
                </table>
            </div>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>
      </div>
    </div>
  </div>