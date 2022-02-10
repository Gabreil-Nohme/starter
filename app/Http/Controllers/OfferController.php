<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use App\Models\Offer;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController extends Controller
{
    use OfferTrait;
   //ajax offer
    public function index()
    {
        //
    }

    public function create()
    {
        return view('ajaxoffers.create');
    }

    public function store(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'images/offers');

        $offer=Offer::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
            'photo'=>$file_name,
        ]);
        if ($offer)
        return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
        ]);

    else
        return response()->json([
            'status' => false,
            'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
        ]);



    }

    public function all()
    {
        $offers=Offer::select('id','price',
        'name_'. LaravelLocalization::getCurrentLocale() . ' as name',
        'details_'. LaravelLocalization::getCurrentLocale() . ' as details',
    )->limit(10)->get();
    return view('ajaxoffers.all',compact('offers'));

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
