<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;
class OrderController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->orderRepo->getAll();
        return response()->json($order, 201);
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
        $order = $this->orderRepo->create($data);
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderRepo->find($id);
        return response()->json($order, 201);
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
        $order = $this->orderRepo->update($id, $data);
        return response()->json($order, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderRepo->delete($id);
        return response()->json(null, 201);
    }
     /**
     * Display order newest.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrder()
    {
        return Order::orderBy('id', 'DESC' )->take(1)->get();
    }

}
