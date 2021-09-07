<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function provinces(Request $request)
    {
        $provinces =  Province::pluck('name', 'id');
        return json_encode($provinces);
    }

    public function regencies(Request $request, $province_id)
    {
        $regencies =  Regency::where('province_id', $province_id)->pluck('name', 'id');
        return json_encode($regencies);
    }

    public function districts(Request $request, $regency_id)
    {
        $districts =  District::where('regency_id', $regency_id)->pluck('name', 'id');
        return json_encode($districts);
    }

    public function villages(Request $request, $district_id)
    {
        $villages =  Village::where('district_id', $district_id)->pluck('name', 'id');
        return json_encode($villages);
    }
}
