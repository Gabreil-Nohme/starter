<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
       /* Validation خاص لل  OfferRequest  يمكن الاستغناء عنهم بعمل ملف
                $roll=$this->getRoll();
                $message=$this->getMessage();
            $validator=Validator::make($request->all(),$roll,$message);
            //اذا حدث خطأ في احد الحقول
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)->withInput($request->all());
            }
        */
            Offer::create($request->all());
            return redirect()->back()->with(['success'=>'the offer is waw']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

       /* Validation خاص لل  OfferRequest  يمكن الاستغناء عنهم بعمل ملف

    //validation للتنسيق تم ادراج مصفوفة سيتم استدعاؤها في الدالة
    protected function getMessage(){
        return $message=[
            'name.required'=>__('messages.name required'),
            'name.unique'=>__('messages.name unique'),
            'price.numeric'=>__('messages.price numeric'),
            'price.required'=>__('messages.price reqired'),
            'details.required'=>__('messages.details required'),

        ];

    }
    protected function getRoll(){
                //unique:offers,name لعدم تكرار اسم في جدول
        //numeric لعدم ادخال احرف
        return  $role=[
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
        ];
    }
*/
}
