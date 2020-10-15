<div class="modal fade" id="view-materies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                          <th></th>
                          <th>Name Materi</th>  
                          <th>Video 480</th>
                          <th>Video 720</th>
                        </tr>
                    </thead>
                    <tbody id="tr-view-show">
                    </tbody>
                </table>
            </div>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  function remove_materies(idclass,idmateries){
    var token = '{{ csrf_token() }}';
    $.ajax(
    {
        url: "{{url('class/detail')}}/"+idclass+'/delete-materies/'+idmateries,
        type: 'DELETE', // replaced from put
        dataType: "JSON",
        data: {
            "id": idmateries ,
            "_token" : token// method and token not needed in data
        },
        success: function (response)
        {
          $('#remove_'+idmateries).remove();
            console.log(response); // see the reponse sent
        },
        error: function(xhr) {
        console.log(xhr.responseText); 
      }
    }); 
    
  }    
  </script>