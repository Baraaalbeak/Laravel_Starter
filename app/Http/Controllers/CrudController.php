<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getoffers(){
        return Offer::select('id','name')->get();
    }

    public function store(){
        Offer::create([
            'name' => 'offer3',
            'peice' => '5000',
            'photo' => '123789.png',
            'details' => 'offer3 details'
        ]);
    }

    public function update(){
        Offer::where('name', 'offer3')
            ->update(['peice' => '4000']);
    }

    public function create(){
        return view('offers\create');
    }

    public function save(Request $request){

        $rules = $this->getRules();
        $errors = $this->getErrors();
        $validator = Validator::make($request->all(),$rules,$errors);
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        };
        
        Offer::create([
            'name' => $request -> name,
            'peice' => $request -> price,
            'details' => $request -> details
        ]);
        return redirect()->back()->with (['success'=>'offer has been added']);
    }


//protected functions
    protected function getRules(){
        return $rules = [
            'name' => 'required|max:200|unique:Offers,name',
            'price' => 'required|numeric',
            'details' => 'required'
        ];
    }
    protected function getErrors(){
        return $errors = [
            'name.required' => __('messages.required') ,
            'price.required' => __('messages.required'),
            'details.required' => __('messages.required'),
            'name.unique' => __('messages.unique'),
            'price.numeric' => __('messages.numeric')
        ];
    }
}
