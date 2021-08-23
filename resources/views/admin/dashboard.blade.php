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
                    <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text">Total Favourite</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
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
                    <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL VIEWS</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">apps</i>
                </div>
                <div class="content">
                    <div class="text">Categories</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>

            <div class="info-box bg-blue-grey hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">labels</i>
                </div>
                <div class="content">
                    <div class="text">TAGS</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>

            <div class="info-box bg-purple hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">account_circle</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL AUTHOR</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>

            <div class="info-box bg-deep-purple hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">fiber_new</i>
                </div>
                <div class="content">
                    <div class="text">TODAY AUTHOR</div>
                    <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>


        </div>
       

        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
           <div class="card">
               <div class="header">
                   <h2>MOST POPULAR POSTS</h2>
               </div>
               <div class="body">
                   <div class="table-responsive">
                       <table class="table table-hover dashboard-task-infos">
                           <thead>
                               <tr>
                                   <th>Rank</th>
                                   <th>Title</th>
                                   <th>Author</th>
                                   <th>Views</th>
                                   <th>Favorite</th>
                                   <th>Comments</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>

                           <tbody>
                            
                                  <tr>
                             
                                      <td>one</td>
                                      <td>dd</td>
                                      <td>25</td>
                                      <td>dd</td>
                                 
                                      <td>
                                          <span class="label bg-green">published</span>
                                      </td>
                                      <td>
                                      <a class="btn btn-primary waves-effect" target="_blank"  href="">View</a>
                                      </td>
                                  </tr> 
                           
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
        </div>
      
    </div>
    <!-- #END# Widgets -->
 

    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>TOP TEN ACTIVE AUTHOR</h2>
                   
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>RANK LIST</th>
                                    <th>NAME</th>
                                    <th>POSTS</th>
                                    <th>COMMENTS</th>
                                    <th>FAVOURITE</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                    <tr>
                                 
                                    <td>gg</td>
                                    <td>1</td>
                                          
                                    </tr>
                             
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
