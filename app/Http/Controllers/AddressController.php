<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;


class AddressController extends Controller
{
    public function addAdress(Request $request)
    {
        $request->validate([
            'street'=>'required',
            'cologne'=>'required',
            'outdoor_number'=>'required',
            'interior_number'=>'required',
            'city'=>'required',
            'state'=>'required',
            'contact'=>'required',
            'postal_code'=>'required',
            'reference'=>'required',
            'phone_contact'=>'required',
            'customer_id'=>'required'
        ]);

        $addres = new Address();
        $addres->street = $request->input('street');
        $addres->cologne = $request->input('cologne');
        $addres->outdoor_number = $request->input('outdoor_number');
        $addres->interior_number = $request->input('interior_number');
        $addres->city = $request->input('city');
        $addres->state = $request->input('state');
        $addres->contact = $request->input('contact');
        $addres->postal_code = $request->input('postal_code');
        $addres->reference = $request->input('reference');
        $addres->phone_contact = $request->input('phone_contact');
        $addres->customer_id = $request->input('customer_id');
        $addres->save();

        return $addres;

    }

    public function updateAdress(Request $request,$id)
    {
        $request->validate([
            'street'=>'required',
            'cologne'=>'required',
            'outdoor_number'=>'required',
            'interior_number'=>'required',
            'city'=>'required',
            'state'=>'required',
            'contact'=>'required',
            'postal_code'=>'required',
            'reference'=>'required',
            'phone_contact'=>'required',
            'customer_id'=>'required'
        ]);

        $adress = Address::find($id);
        $adress->street = $request->input('street');
        $adress->cologne = $request->input('cologne');
        $adress->outdoor_number = $request->input('outdoor_number');
        $adress->interior_number = $request->input('interior_number');
        $adress->city = $request->input('city');
        $adress->state = $request->input('state');
        $adress->contact = $request->input('contact');
        $adress->postal_code = $request->input('postal_code');
        $adress->reference = $request->input('reference');
        $adress->phone_contact = $request->input('phone_contact');
        $adress->customer_id = $request->input('customer_id');
        $adress->save();


    }

    public function deleteAdress($id)
    {
        $adress = Address::find($id);
        $adress->delete();
    }
}
