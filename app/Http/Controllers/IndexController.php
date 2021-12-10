<?php

namespace App\Http\Controllers;

use App\district;
use App\division;
use App\place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $divisions = DB::select('select * from divisions ');
        return view('index', compact('divisions'));
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
}
