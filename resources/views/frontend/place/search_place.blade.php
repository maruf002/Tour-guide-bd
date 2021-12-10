 @extends('frontend.app') 

@section('title', 'blog')


@push('css')
{{-- <link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet"> --}}
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<style>
.social-card-header{
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    height: 96px;
}
.social-card-header i {
    font-size: 32px;
    color:#FFF;
}
.bg-facebook {
    background-color:#3b5998;
}
.text-facebook {
    color:#ce9f07;
}
.bg-google-plus{
    background-color:#dd4b39;
}
.text-google-plus {
    color:#dd4b39;
}
.bg-twitter {
    background-color:#1da1f2;
}
.text-twitter {
    color:#1da1f2;
}
.bg-pinterest {
    background-color:#bd081c;
}
.text-pinterest {
    color:#bd081c;
}
.share:hover {
        text-decoration: none;
    opacity: 0.8;
}
</style>
	
@endpush

@section('content')


{{-- <section class="blog-area section"> --}}
	<div class="container">

		<div class="row">
  @if($place->count() >0)
		@foreach($place as $key => $pl)

             <div class="col-md-10 mt-5">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="height: 290px">

          
                   <div class="card-body d-flex flex-column align-items-start">
                      <strong class="d-inline-block mb-2 text-primary">{{$pl->title}}</strong>
                      <h6 class="mb-0">

                        <span class="badge badge-warning">Author Name: </span> {{$pl->user->name}}
                       
                          
                      </h6>

                     
                      <div class="mb-1 text-muted small"> {{$pl->created_at->diffforhumans()}}</div>
                      <p class="card-text mb-auto">  {{Str::limit( strip_tags($pl->description,150)) }} 
                    </p>
                      <a class="btn btn-sm" role="button" href="http://www.jquery2dotnet.com/">Continue reading</a>
                   </div>
                   <img class="crd-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{asset('storage/post/'.$pl->image)}}" style="width: 350px; height: 280px;">
             
                
                </div>

                
             </div>
			
	
		@endforeach

        @else
        
        <div class="col-lg-12 col-md-12 mt-5">
            <div class="card h-100">
                <div class="single-post post-style-1">

                
                    <div class="blog-info">

                    <h4 class="title">
                        <strong>Sorry,No Place Added For This Search Area  :(</strong>
                    </h4>

                

                    </div><!-- blog-info -->
                </div><!-- single-post -->
            </div><!-- card -->
        </div><!-- col-lg-4 col-md-6 -->

         @endif
		</div><!-- row -->

		{{-- <a class="load-more-btn" href="#"><b>LOAD MORE</b></a> --}}

	</div><!-- container -->
{{-- </section><!-- section --> --}}

@endsection

@push('js')


	
@endpush