<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $customerRepo;

    public function __construct(CustomerRepositoryInterface $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = $this->customerRepo->getAll();
        return response()->json($customer, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Customer([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        $data->save();
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerRepo->find($id);
        return response()->json($customer, 201);
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
        $data = $request->all();
        $customer = $this->customerRepo->update($id, $data);
        return response()->json($customer, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerRepo->delete($id);
        return response()->json(null, 201);
    }
}
