<?php

namespace App\Http\Controllers;

use App\district;
use App\division;
use App\place;
use App\PlaceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
      $place = place::latest()->take(4)->where('approve',1)->get();
        $divisions = DB::select('select * from divisions ');
        return view('index', compact('divisions','place'));
    }

    public function myformAjax($DivisionId)
    {

        $id = division::select('id')->where("id", $DivisionId)->first();

        return $citys = district::where('division_id', $id['id'])->pluck("bn_name", "id");


        return json_encode($citys);
    }


    public function search(Request $request)
    {

        $district = $request->District;
        $division = $request->Division;

        $place = place::where('district_id', $district)
            ->where('divsion_id', $division)
            ->where('approve', 1)->get();

        //    place::where('district_id', $district AND 'approve', 1)->get();
        return view('frontend.place.search_place', compact('place'));
    }


    public function detailes($id){

        $place = place::find($id);

         $place_image = PlaceImage::where('place_id',$id)->get();

        return view('frontend.place.detail_place',compact('place','place_image'));

    }

    public function modal_details(Request $request){
         $id = $request->id;
        $place = place::find($request->id);
        $place_image = PlaceImage::where('place_id',$id)->get();
        return view('frontend.place.modal_view',compact('place','place_image'));


    }

    public function live_search(Request $request){
        $posts= place::where('name', 'like', '%' . $request->name. '%')->get();
        return view('backend.manual_attendance.timeline', compact('attendanceData'));
    }

}
