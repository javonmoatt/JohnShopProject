<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Customer;
use App\ProductLine;
use app\User;

class CustomersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductLine::all();
        return view('customers.index')->with('productlines',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $customers = Customer::all();
        return view('customers.create');
        // ->with('customer',$customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'studentIdNumber' => 'required',
            'customerName' => 'required',
            'contactLastName'=> 'required',
            'contactFirstName'=> 'required',
            'phone' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'city' => 'required',
            'parish' => 'required',
            'country' => 'required'
        ]);

        $customer = new Customer;
        $customer->studentIdNumber = $request->input('studentIdNumber');
        $customer->customerName = $request->input('customerName');
        $customer->contactLastName = $request->input('contactLastName');
        $customer->contactFirstName = $request->input('contactFirstName');
        $customer->phone = $request->input('phone');
        $customer->addressLine1 = $request->input('addressLine1');
        $customer->addressLine2 = $request->input('addressLine2');
        $customer->city = $request->input('city');
        $customer->parish = $request->input('parish');
        $customer->country = $request->input('country');
        $customer->creditLimit = $request->input('creditLimit');
        $customer->save();

        return redirect('/dashboard')->with('success','Account Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::find($id);
        return view('customer.show')->with('customer',$customers);
    }

    public function search()
    {
        $customer = Customer::all();
        return view('customers.search')->with('customer',$customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit')->with('customer',$customers);
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
        return redirect('/customerss')->with('success','Customer Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function product_menu()
    {
        return view('customers.item_list');
    }

    public function checkout()
    {
        return view('customers.checkout');
    }
}
