@foreach($posts as $key => $pl)

<div class="col-md-12 mt-5 search_live">

   <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="height: 290px">


      <div class="card-body d-flex flex-column align-items-start">
         <strong class="d-inline-block mb-2 text-primary">{{$pl->title}}</strong>
         <h6 class="mb-0">

           <span class="badge badge-warning">Author Name: </span> {{$pl->user->name}}
    
         </h6>

         <div class="mb-1 text-muted small"> {{$pl->created_at->diffforhumans()}}</div>
         <p class="card-text mb-auto">  {{Str::limit( strip_tags($pl->description,150)) }} 
       </p>
         <a class="btn btn-sm" role="button" href="{{route('place.detailes',$pl->id)}}">Continue reading</a>
      </div>
      <img class="crd-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{asset('storage/post/'.$pl->image)}}" style="width: 350px; height: 280px;">

   </div>
   
</div>

@endforeach