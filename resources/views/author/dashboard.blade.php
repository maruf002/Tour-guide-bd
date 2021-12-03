@extends('backend.app')

@section('title', 'Dashboard')

@push('css')
    
@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
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
                    <div >{{$total_post}}</div>
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
                    <div >{{$pending}}</div>
                </div>
            </div>
        </div>
       
    </div>


    <!-- #END# Widgets -->
 

  
</div>

@endsection

@push('js')

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
