@extends('backend.app')

@section('title', 'places')


@push('css')

    
@endpush


@section('content')

  
<div class="container-fluid">
    <div class="block-header">
       
     <a class="btn btn-primary waves-effect" href="{{ route('author.post.create') }}">
        <i class="material-icons">add</i>
        <span>Add New post</span>
     </a>
    </div>
    
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL POSTS
                        
                    <span class="badge-info bg-blue">{{$places->count()}}</span>
                    </h2>
                    {{-- <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Is Approved</th>
                                    <th>CREATED AT</th>
                                    <th>UPDATED AT</th>
                                    <th>ACTION</th>
                                  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Is Approved</th>   
                                    <th>CREATED AT</th>
                                    <th>UPDATED AT</th>
                                    <th>ACTION</th>
                                </tr>
                            </tfoot>

                            <tbody>

                                @foreach($places as $key => $pl)
                                   <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pl->title }}</td>
                                    <td>{{ $pl->user->name }}</td>
                                    <td>
                                        <img src="{{asset('storage/post/'.$pl->image)}}" style="width:120px" height="10%" alt="">
                                        {{-- <img src="{{Storage::disk('public')->url('post/'.$pl->image)}}" alt=""> --}}
                                    </td>
                                   
                                    <td>
                                        @if($pl->approve == true)

                                         <span class="badge bg-blue">Approved</span>
                                         @else
                                         <span class="badge bg-pink">Pending</span>
                                            
                                        @endif
                                    </td>
                                    
                                    <td>{{ $pl->created_at }}</td>
                                    <td>{{ $pl->updated_at}}</td>
            
                            <td class="text-center">

                                    <a href="{{ route('author.post.show',$pl->id)}}" class="btn btn-info">
                                    <i class="material-icons">visibility</i>

                                    </a>
                                    <a href="{{ route('author.post.edit',$pl->id)}}" class="btn btn-info">
                                          <i class="material-icons">edit</i>

                                    </a>

                                <button class="btn btn-danger waves-effect" type="button" onclick="deletepost({{$pl->id}})" >
                                        <i class="material-icons">delete</i>
                                    </button> 
                                <form id="delete-form-{{$pl->id}}" action="{{ route('author.post.destroy',$pl->id) }}" method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                            </td>
                                   </tr>
                                @endforeach



                            
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>  
@endsection


@push('js')

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deletepost(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>




@endpush