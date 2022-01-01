<?php

namespace App\Http\Controllers\Author;

use App\district;
use App\place;
use App\division;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlaceImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = place::where('user_id', Auth::id())->get();
        return view('author.post.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = division::get();
        return view('author.post.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:places',
            'Division' => 'required',
            'District' => 'required',
            'image'     => 'required',
            'body' => 'required',
        ]);


        $image = $request->file('image');
        $slug  = 555;
        if (isset($image)) {
            //make unique name for image
            $currentDate = carbon::now()->toDatestring();
            $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!storage::disk('public')->exists('post')) {
                storage::disk('public')->makeDirectory('post');
            }
            $postImage = Image::make($image)->stream();
            storage::disk('public')->put('post/' . $imageName, $postImage);
        } else {
            $image = "default.png";
        }

        $place = new place();

        $place->user_id = Auth::id(); //auth::id()= present authinticated id
        $place->title   = $request->title;
        $place->image   = $imageName;
        $place->district_id   = $request->District;
        $place->divsion_id   = $request->Division;
        $place->description    = $request->body;
        $place->save();

        $files = $request->file('photos');

        foreach ($files as $key => $image) {
            // $request->moreimage;

            $slug  = 555;
            if (isset($image)) {
                //make unique name for image
                $currentDate = carbon::now()->toDatestring();
                $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!storage::disk('public')->exists('photos')) {
                    storage::disk('public')->makeDirectory('photos');
                }
                $postImage = Image::make($image)->stream();
                storage::disk('public')->put('photos/' . $imageName, $postImage);
            } else {
                $image = "default.png";
            }

            $image = new PlaceImage();

            $image->user_id = Auth::id(); //auth::id()= present authinticated id
            $image->place_id   = $place->id;
            $image->photos   = $imageName;
            $image->save();
        }

        Toastr::success('post successfully saved', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = place::find($id);
        if ($post->user_id != Auth::id()) {
            Toastr::error('you are not authorized to access this post', 'Error');
            return redirect()->back();
        }
        return view('author.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisions = division::get();
        $place = place::find($id);
        $s_division = $place->divsion_id;
        $s_district = $place->district_id;

        $dv = DB::table('divisions')->where('id', $s_division)->get();
        return view('author.post.edit', compact('place', 'divisions', 'dv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        // 	'title' => 'required|max:255',
        // 	'Division' => 'required',
        // 	'District' => 'required',
        //     'body'=>'required', 
        // ]);


        $place = place::find($id);

        $image = $request->file('image');
        $slug  = 555;
        if (isset($image)) {
            $place = place::find($id);
            //make unique name for image
            $currentDate = carbon::now()->toDatestring();
            $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!storage::disk('public')->exists('post')) {
                storage::disk('public')->makeDirectory('post');
            }

            //delete old post image
            if (storage::disk('public')->exists('post/' . $place->image)) {

                storage::disk('public')->delete('post/' . $place->image);
            }


            $postImage = Image::make($image)->stream();
            storage::disk('public')->put('post/' . $imageName, $postImage);
        } else {
            $imageName = $place->image;
        }

        $place->user_id = Auth::id(); //auth::id()= present authinticated id
        $place->title   = $request->title;
        $place->image   = $imageName;
        $place->district_id   = $request->District;
        $place->divsion_id   = $request->Division;
        $place->description    = $request->body;
        $place->save();



        $files = $request->file('photos');

        if (isset($files)) {
            $place = PlaceImage::where('place_id', $id)->get();
              //delete old post image
              foreach ($place as $key => $pl) {
                # code...

                if (storage::disk('public')->exists('photos/' . $pl->photos)) {

                    storage::disk('public')->delete('photos/' . $pl->photos);
                }
            }

            $place = PlaceImage::where('place_id', $id)->delete();

            foreach ($files as $key => $image) {
                // $request->moreimage;
               
                $slug  = 555;
                if (isset($image)) {
                    //make unique name for image
                    $currentDate = carbon::now()->toDatestring();
                    $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    if (!storage::disk('public')->exists('photos')) {
                        storage::disk('public')->makeDirectory('photos');
                    }

                  

                    $postImage = Image::make($image)->stream();
                    storage::disk('public')->put('photos/' . $imageName, $postImage);
                } 

                $image = new PlaceImage();

                $image->user_id = Auth::id(); //auth::id()= present authinticated id
                $image->place_id   = $id;
                $image->photos   = $imageName;
                $image->save();
            }
        }

        Toastr::success('post successfully updated', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = place::find($id);
        if (storage::disk('public')->exists('post/' . $post->image)) {
            storage::disk('public')->delete('post/' . $post->image);
        }

        $post->delete();
        Toastr::success('post successfully deleted', 'success');
        return redirect()->back();
    }
}
