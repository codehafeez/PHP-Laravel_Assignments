<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;

use App\Models\Country;
use Illuminate\Http\Request;
class CountriesController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('countries-list');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addCountry(Request $request){
        $validator = \Validator::make($request->all(),[
            'country_name'=>'required|unique:countries',
            'capital_city'=>'required',
        ]);

        if(!$validator->passes()){
             return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $country = new Country();
            $country->country_name = $request->country_name;
            $country->capital_city = $request->capital_city;
            $query = $country->save();

            if(!$query){
                return response()->json(['code'=>0,'msg'=>'Something went wrong']);
            }else{
                return response()->json(['code'=>1,'msg'=>'New Country has been successfully saved']);
            }
        }
   }

    

    /**
     * Display the specified resource.
     */
    public function getCountries(Request $request)
    {
        if ($request->ajax()) {
            $countries = Country::all();
            return DataTables::of($countries)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            return '<div class="btn-group">
                                        <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editCountryBtn">Update</button>
                                        <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteCountryBtn">Delete</button>
                                    </div>';
                        })
                        ->rawColumns(['actions'])
                        
                        ->make(true);
        }
    
        return view('countries.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getCountriesDetails(Request $request)
    {
        $country_id = $request->country_id;
        $countryDetails = Country::find($country_id);

        return response()->json(['details'=>$countryDetails]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCountriesDetails(Request $request)
    {
        $country_id = $request->cid;
    
        $validator = \Validator::make($request->all(),
        [
            'country_name' => 'required|unique:countries,country_name,'.$country_id,
            'capital_city' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }
    
        $country = Country::find($country_id);
        $country->country_name = $request->country_name;
        $country->capital_city = $request->capital_city;
        $query = $country->save();
    
        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Country Details have been updated']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCountry(Request $request){
        $country_id = $request->country_id;
        $query = Country::find($country_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Country has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }
}
