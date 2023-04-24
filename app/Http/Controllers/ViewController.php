<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Peticiones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ViewController extends Controller
{
    public function loginView()
    {
        return view('Auth.Login');
    }

    public function dashboardView()
    {
        return view('Components.dashboard');
    }

    public function collaboratorsView()
    {
        $callaborators = User::select(
            'users.id',
            'users.name',
            'users.lastname',
            'users.branchoffice',
            'users.email',
            'users.password',
            'rol.area')->join('rol','rol.id','=','users.area')
            ->where('users.status','=',1)->get();

        $roles = Rol::all();


        return view('Components.collaborators',compact('callaborators','roles'));
    }

    public function solicitudesView()
    {
        if(Auth::user()->area === 1){
            return back();
        }
        if(Auth::user()->area == 2){
            $solicitudes = Peticiones::select(
                'peticiones.id',
                'users.name',
                'accion',
                'fechasolicita')->join('users','users.id','=','peticiones.usuario_id')
                ->where('peticiones.aprobada','=',0)->where('peticiones.accion', '=', 'EDITAR')->get();
        }
        else{
            $solicitudes = Peticiones::select(
                'peticiones.id',
                'users.name',
                'accion',
                'fechasolicita')->join('users','users.id','=','peticiones.usuario_id')
                ->where('peticiones.aprobada','=',0)->get();
        }


        return view('Components.solicitudes',compact('solicitudes'));
    }

    public function profileView()
    {
        $profile = User::select(
            'users.id',
            'users.name',
            'users.lastname',
            'users.branchoffice',
            'users.email',
            'users.password',
            'rol.area')->join('rol','rol.id','=','users.area')->where('users.id','=',Auth::user()->id)->get();

        return view('Auth.profile',compact('profile'));
    }

    public function customerView(Request $request)
    {
        $customer = Customer::select(
            'customers.id',
            'customers.name',
            'customers.lastname',
            'customers.phone',
            'customers.email',
            'customers.social_reason',
            'customers.tax_situation',
            'customers.source',
            'customers.sale_commission',
            'customers.rent_commission',
            'customers.user_id',
            'customers.status',
            'users.name as UserName',
            'addresses.id as idAddress',
            'addresses.street',
            'addresses.cologne',
            'addresses.alias',
            'addresses.outdoor_number',
            'addresses.interior_number',
            'addresses.city',
            'addresses.state',
            'addresses.contact',
            'addresses.postal_code',
            'addresses.reference',
            'addresses.phone_contact',
        )->join('users','users.id','=','customers.user_id')
         ->join('addresses','addresses.customer_id','=','customers.id')
         ->where('customers.name','LIKE','%'.$request->search.'%')
         ->orWhere('customers.lastname','LIKE','%'.$request->search.'%')->get();

         $user = User::select('users.id','users.name')->where('users.area','=',3)->where('users.status','=',1)->get();

        return view('Components.clients',compact('customer','user'));
    }

    public function addCustomerView()
    {
        $user = User::select('users.id','users.name')->where('users.area','=',3)->where('users.status','=',1)->get();

        return view('Components.addClients',compact('user'));
    }
    public function addAddressView($id)
    {
        $address = Customer::select(
            'customers.id',
            'customers.name',
            'customers.lastname',
            'addresses.street',
            'addresses.cologne',
            'addresses.alias',
            'addresses.outdoor_number',
            'addresses.interior_number',
            'addresses.city',
            'addresses.state',
            'addresses.contact',
            'addresses.postal_code',
        )->join('users','users.id','=','customers.user_id')
         ->join('addresses','addresses.customer_id','=','customers.id')
         ->where('customers.id','=',$id)->limit(1)->get();

         $customer = $id;

         return view('Components.addaddress',compact('address','customer'));
    }
    public function calendarView()
    {
        return view('Components.calendar');
    }
    public function quotesView()
    {
        return view('Components.quotes');
    }
    public function newquotesView()
    {
        return view('Components.newquote');
    }
}
