@extends('layout.admin')

@section('content')


<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">{{$record->name}} 's Crimes</h3>
                <button class="btn btn-sm btn-danger btn-round btn-icon float-right" data-toggle="modal" data-target="#Addmodel"><span class="btn-inner--icon"><i
                    class="fas fa-plus"></i></span><span class="btn-inner--text">Add Crime</span></button>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Detail</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($crimes as $key=> $crime)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$crime->crime_detail}}</td>
                          
                            {{-- <td>
                                <a href="{{route('admin.record.show',$record->id)}}"><button class="btn btn-sm btn-primary btn-round btn-icon editBtn"> <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                <span class="btn-inner--text">Edit</span>
                              </button></a>
                            </td>--}}
                            
                            <td>
                               
                                <button type="button" class="btn btn-sm btn-danger btn-round btn-icon deleteBtn"
                                    data-toggle="modal" data-target="#exampleModal" id="{{$crime->id}}"><span
                                        class="btn-inner--icon"><i class="fas fa-trash"></i></span><span
                                        class="btn-inner--text">Delete</span>
                                </button>

                            </td> 
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
    
      <div class="modal-content">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <label for="">Are you sure you want to delete ?</label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>

      </div>

  </div>
</div>

<div class="modal fade" id="Addmodel" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <form id="myForm" action="{{route('admin.detail-record.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Add Crime</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <textarea class="form-control" placeholder="Crime Detail" type="text" name="crime_detail" id="crime_detail" rows="5" required></textarea>
                        </div>
                    </div>
                    
                    <input type="hidden" name="record_id" value="{{$record->id}}">
                   
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        $('body').on('click', '.deleteBtn', function(){
        let id = $(this).attr('id');
        $('#id').val(id);
        $('#deleteForm').attr('action','{{route('admin.detail-record.destroy','')}}' +'/'+id);
        });
    });
</script>

@endsection