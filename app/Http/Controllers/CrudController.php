<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Offer;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\OfferTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
  use OfferTrait;
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
            //import trait->saveimage
           $file_name = $this->saveImage($request->photo,'images/offers');

        Offer::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
            'photo'=>$file_name,


        ]);
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
    public function edit_offer($offer_id)
    {
         $offer=Offer::find($offer_id);
         if(!$offer){
             return redirect()->route('offer.all',compact('offer_id'));
         }
         return view('offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $offer_id)
    {
        $offer=Offer::find($offer_id);
        if(!$offer){
            return redirect()->back();
        }
       // $offer->update($request->all());
        return redirect()->back()->with(['success'=>'تم تحديث البيانات']);


       /* $offer->update([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,

        ]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($offer_id)
    {
       $offer=Offer::find($offer_id);
       if(!$offer)
       return redirect()->back()->with(['success'=>__('messages.erroroffer')]);

       $offer->delete($offer_id);
       return redirect()->route('offer.all')->with(['success'=>'offer deleted']);
    }
    public function allOffers()
    { //اختيار حسب اللغة نسخ لصق نفس كلشي مع المسافات
        $offers=Offer::select('id','price',
        'name_'. LaravelLocalization::getCurrentLocale() . ' as name',
        'details_'. LaravelLocalization::getCurrentLocale() . ' as details',
    )->get();
        return view('offers.all',compact('offers'));
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
