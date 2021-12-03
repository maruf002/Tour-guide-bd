@extends('backend.app')

@section('title', 'Dashboard')

@push('css')
    
@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2> Admin DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL POSTS</div>
                    <div>{{$total_post}}</div>
                </div>
            </div>
        </div>
   
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL PENDING POSTS</div>
                    <div>{{$pending}}</div>
                </div>
            </div>
        </div>

        
   
    </div>



    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2> AUTHOR</h2>
                   
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Join date</th>
                                    <th>Action</th>
                              
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($user as $us)
                                    
                              
                        
                                    <tr>
                                 
                                    <td>{{$us->id}}</td>
                                    <td>{{$us->name}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->created_at}}</td>
                                    <td>
                                        <button class="btn btn-danger waves-effect" type="button"
                                        onclick="deleteproduct({{ $us->id }})">
                                        delete
                                    </button>
                                    <form id="delete-form-{{ $us->id }}"
                                        action="{{ route('admin.user.delete', $us->id) }}"
                                        method="POST" style="display: none;">
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
        <!-- #END# Task Info -->
      
    </div>
</div>

@endsection

@push('js')

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script type="text/javascript">
        function deleteproduct(id) {
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
                    document.getElementById('delete-form-' + id).submit();
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


<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>
 
<!-- Morris Plugin Js -->
<script src="{{asset('assets/backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('assets/backend/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>


<script src="{{asset('assets/backend/js/pages/index.js')}}"></script>
    
@endpush
