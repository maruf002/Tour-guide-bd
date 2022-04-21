@extends('frontend.app') 

@section('title', 'blog')


@push('css')
<link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">
 
<link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!------ Include the above in your HEAD tag ---------->

{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> --}}


<style>
.img{
    border-radius: 15px;
    margin-bottom:20px;
}

.t{
    height: 80px;
}

.jj{
    margin-left: 60px;
    margin-bottom: 20px;
}
hr{
   background-color: rgb(29, 221, 164);
}



/* .gg{
    border:5px solid black;
} */
</style>
	
@endpush

@section('content')
<div class="conatiner-clearfix">
<div class="row">
    <div class="col-md-6 offset-2 mt-3  ">
        <div class="card " style="width: 48rem;">
         
            <img class="card-img-top img-thumbnail" src="{{asset('storage/post/'.$place->image)}}" alt="Card image cap">
            <div class="card-body overflow-auto" style="height:400px">
              {{-- <h5 class="card-title">   <span class="badge badge-warning">Author Name: </span> {{$place->user->name}}</h5> --}}
              
              {{-- <div class="mb-1 text-muted small"> {{$place->created_at->diffforhumans()}}</div> --}}
              <h5 class="card-title badge badge-warning badge-pill">{{$place->title}}</h5>
              <p class="card-text">{!! $place->description !!}</p>
         
            </div>
          </div>

          <div class="card mt-5 " style="width: 48rem;">
          
            <div class="card-body overflow-auto">
                যেভাবে যাবেন 
                <p class="card-title t overflow-auto ">{!! $place->going !!}  </p> <hr>
                কোথায় থাকবেন
                <p class="card-title t overflow-auto">{!! $place->stay !!}</p><hr>
                কোথায় খাবেন 
                <p class="card-title t overflow-auto"> {!! $place->eat !!} </p><hr>
               
           
              </div>
          </div>
          
          

       
    </div>


    <div class="col-md-4 mt-3 ">
        <div class="jj">
    <span class="badge badge-primary"><h3>কিছু দর্শনীয় স্থানের ছবি </h3>  </span> <br>

   </div>
        @foreach ($place_image as  $p)
        <img class="img-fluid img" alt="Thumbnail [200x250]" src="{{asset('storage/photos/'.$p->photos)}}" style="width: 400px; height: 300px;">
        @endforeach
            </div>
            
         </div>

    </div>

   

@endsection

@push('js')


	
@endpush