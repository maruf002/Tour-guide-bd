@extends('backend.app')

@section('title', 'Tag')


@push('css')

    
@endpush


@section('content')
<div class="container-fluid">

{{-- first row  --}}
<a href="{{route('author.post.index')}}" class="btn btn-danger waves-effect">BACK</a>
@if($post->approve == true)
<button type="button" class="btn btn-success pull-right" >

  <i class="material-icons">done</i>
  <span>Approve</span>
</button>


@else
 <button type="button" class="btn btn-danger pull-right" disabled>
<i class="material-icons">done</i>
 <span> not Approved</span>
 </button>

@endif

<br>
<br>

 <div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   {{$post->title}}
                   {{-- //user is function in post model  --}}
                <small>Posted By <strong><a href="">{{$post->user->name}}</a></strong> on{{$post->created_at->toFormattedDateString()}}</small>
                 
               
                </h2>
          
            </div>
            <div class="body">
             {{-- != for removing html tag from body like <p></p>, for use it we need only one bracket  --}}
              {!!$post->description!!} 
              
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
 



        <div class="card">
            <div class="header bg-amber">
                <h2>
               Featured Image
                </h2>
          
            </div>
            <div class="body">
                {{-- categories is a function in post model --}}
             <img class="img-responsive thumbnail" src="{{Storage::disk('public')->url('post/'.$post->image)}}" alt=""> 
           
         
                
            </div>
        </div>

    </div>
</div>

{{-- body part --}}



<!-- #END# Vertical Layout -->
</div>
    
@endsection


@push('js')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script>
    $(function () {
  

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL ='{{asset('assets/backend/plugins/tinymce')}}';
});
</script>



    
@endpush