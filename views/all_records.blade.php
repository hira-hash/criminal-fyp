@extends('layout.admin')

@section('content')


<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">All Records</h3>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Cnic</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Crimes</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($records as $key=> $record)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset($record->image)}}" alt="" height="50" width="50">
                            </td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->cnic}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->address}}</td>
                            <td>
                                <a href="{{route('admin.record.show',$record->id)}}"><button class="btn btn-sm btn-info btn-round btn-icon editBtn"> <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                <span class="btn-inner--text">Crime Details</span>
                              </button></a>
                            </td>
                            <td>
                                <a href="{{route('admin.record.show',$record->id)}}"><button class="btn btn-sm btn-primary btn-round btn-icon editBtn"> <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                <span class="btn-inner--text">Edit</span>
                              </button></a>
                            </td>
                            
                            <td>
                               
                                <button type="button" class="btn btn-sm btn-danger btn-round btn-icon deleteBtn"
                                    data-toggle="modal" data-target="#exampleModal" id="{{$record->id}}"><span
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


@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        $('body').on('click', '.deleteBtn', function(){
        let id = $(this).attr('id');
        $('#id').val(id);
        $('#deleteForm').attr('action','{{route('admin.record.destroy','')}}' +'/'+id);
        });
    });
</script>

@endsection