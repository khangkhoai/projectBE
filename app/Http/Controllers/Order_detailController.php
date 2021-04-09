<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Order_detail\Order_detailRepositoryInterface;
class Order_detailController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $order_detailRepo;

    public function __construct(Order_detailRepositoryInterface $order_detailRepo)
    {
        $this->order_detailRepo = $order_detailRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_detail = $this->order_detailRepo->getAll();
        return response()->json($order_detail, 201);
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
        $data = $request->all();
        $order_detail = $this->order_detailRepo->create($data);
        return response()->json($order_detail, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_detail = $this->order_detailRepo->find($id);
        return response()->json($order_detail, 201);
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
        $order_detail = $this->order_detailRepo->update($id, $data);
        return response()->json($order_detail, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->order_detailRepo->delete($id);
        return response()->json(null, 201);
    }
}
