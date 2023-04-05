<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{

    public function addCustomer(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>'required|max:10',
            'email'=>'required|email',
            'alias'=>'required',
            'social_reason'=>'required',
            'tax_situation'=>'required|mimes:pdf',
            'source'=>'required',
            'sale_commission'=>'required',
            'rent_commission'=>'required',
            'user_id'=>'required',
            'street'=>'required',
            'cologne'=>'required',
            'outdoor_number'=>'required',
            'interior_number'=>'required',
            'city'=>'required',
            'state'=>'required',
            'contact'=>'required',
            'postal_code'=>'required',
            'reference'=>'required',
            'phone_contact'=>'required|max:10',
        ]);
        $customer = new Customer();
        $addres = new Address();

        $customer->name = $request->input('name');
        $customer->lastname = $request->input('lastname');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->social_reason = $request->input('social_reason');
        $file = $request->file('tax_situation');
        // Verificar si el archivo ya existe
        if (Storage::exists('customer-pdfs/' . $file->getClientOriginalName())) {
            if (Storage::exists('customer-pdfs/' . $customer->tax_situation)) {
                // Eliminar el archivo anterior
                Storage::delete('customer-pdfs/' . $customer->tax_situation);
            }
        }
        // Generar un nombre único para el archivo
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        // Mover el archivo a la ubicación deseada
        Storage::put('customer-pdfs/' . $fileName, file_get_contents($file));

        // Guardar el nombre del archivo en la base de datos
        $customer->tax_situation = $fileName;
        $customer->source = $request->input('source');
        $customer->sale_commission = $request->input('sale_commission');
        $customer->rent_commission = $request->input('rent_commission');
        $customer->user_id = $request->input('user_id');
        $customer->save();

        if($customer->save())
        {
            $findCustomer = Customer::where('email','=',$request->email)->first();

            $addres->street = $request->input('street');
            $addres->cologne = $request->input('cologne');
            $addres->alias = $request->input('alias');
            $addres->outdoor_number = $request->input('outdoor_number');
            $addres->interior_number = $request->input('interior_number');
            $addres->city = $request->input('city');
            $addres->state = $request->input('state');
            $addres->contact = $request->input('contact');
            $addres->postal_code = $request->input('postal_code');
            $addres->reference = $request->input('reference');
            $addres->phone_contact = $request->input('phone_contact');
            $addres->customer_id = $findCustomer->id;
            $addres->save();


            if($addres->save())
            {
                return redirect('/customers')->with('msg','OK');
            }
        }
        else
        {
            return redirect('/addcustomers')->with('msg','BADREQUEST');
        }

    }

    //ACTUALIZAR CLIENTE
    public function updateCustomer(Request $request,$id)
    {
        dump($id);
        dump($request);
        $request->validate([
            'name'=>'required',
            'phone'=>'required|max:10',
            'email'=>'required|email',
            'social_reason'=>'required',
            'tax_situation'=>'mimes:pdf',
            'source'=>'required',
            'sale_commission'=>'required',
            'rent_commission'=>'required',
            'status'=>'required',
            'user_id'=>'required',
            'street'=>'required',
            'cologne'=>'required',
            'outdoor_number'=>'required',
            'interior_number'=>'required',
            'city'=>'required',
            'state'=>'required',
            'contact'=>'required',
            'postal_code'=>'required',
            'phone_contact'=>'required|max:10',
        ]);

        $customer = Customer::find($id);
        $address = Address::where('customer_id','=',$id)->first();

        dump($address);

        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->social_reason = $request->input('social_reason');
        // Verificar si el archivo ya existe
        if (Storage::exists('customer-pdfs/' . $customer->tax_situation)) {
            // Eliminar el archivo anterior
            Storage::delete('customer-pdfs/' . $customer->tax_situation);
        }
        if(Storage::disk('pdfs')->get('customer-pdfs/'.$customer->tax_situation != $request->tax_situation))
        {
            Storage::delete('customer-pdfs/' . $customer->tax_situation);
        }
        $file = $request->file('tax_situation');

        // Generar un nombre único para el archivo
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        // Mover el archivo a la ubicación deseada
        Storage::put('customer-pdfs/' . $fileName, file_get_contents($file));

        // Actualizar el nombre del archivo en la base de datos
        $customer->tax_situation = $fileName;
        $customer->source = $request->input('source');
        $customer->sale_commission = $request->input('sale_commission');
        $customer->rent_commission = $request->input('rent_commission');
        $customer->user_id = $request->input('user_id');
        $customer->status = $request->input('status');
        dump($customer);
        $address->street = $request->input('street');
        $address->cologne = $request->input('cologne');
        $address->outdoor_number = $request->input('outdoor_number');
        $address->interior_number = $request->input('interior_number');
        $address->city = $request->input('city');
        $address->state = $request->input('state');
        $address->contact = $request->input('contact');
        $address->postal_code = $request->input('postal_code');
        $address->phone_contact = $request->input('phone_contact');
        $address->customer_id = $id;
        dump($address);
        $customer->save();
        $address->save();

        dump($customer,$address);

        if($address->save() && $customer->save())
        {
            return redirect('/customers')->with('msg','UPDATE');
        }
        else
        {
            return redirect('/customers')->with('msg','BADREQUEST');
        }
    }

    public function changeStatus($id)
    {
        $customer = Customer::find($id);
        $customer->status = false;
        $customer->save();
        if($customer->save())
        {
           return redirect('/customers')->with('msg','STATUS');
        }
    }

    public function addNewAddress(Request $request,$id)
    {
        $request->validate([
            'street'=>'required',
            'cologne'=>'required',
            'outdoor_number'=>'required',
            'interior_number'=>'required',
            'city'=>'required',
            'state'=>'required',
            'postal_code'=>'required',
            'reference'=>'required',
            'alias'=>'required'
        ]);
        $customer = Customer::find($id);
        $findaddres = Address::where('customer_id','=',$customer->id)->first();
        $addres = new Address();
        $addres->street = $request->input('street');
        $addres->cologne = $request->input('cologne');
        $addres->alias = $request->input('alias');
        $addres->outdoor_number = $request->input('outdoor_number');
        $addres->interior_number = $request->input('interior_number');
        $addres->city = $request->input('city');
        $addres->state = $request->input('state');
        $addres->contact = $findaddres->contact;
        $addres->postal_code = $request->input('postal_code');
        $addres->reference = $request->input('reference');
        $addres->phone_contact = $findaddres->phone_contact;
        $addres->customer_id = $customer->id;
        $addres->save();

        if($addres->save())
        {
            return redirect('/customers')->with('msg','ADDRESSOK');
        }
        else
        {
            return redirect('/addaddress')->with('msg','BADREQUEST');
        }

    }


}
