<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
class ProductController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepo->get();
        return response()->json($product, 201);
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
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $name = time() . $file->getClientOriginalName();
            $file_path = $request->file('thumb')->move('uploads/', $name);
            $path_name = $file_path->getPathname();
        }
        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'sale_price' => $request->price - ($request->price * ($request->discount / 100)),
            'thumb' => $path_name ?? ''
        ];
        
        return  $this->productRepo->create($data);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = $this->productRepo->find($id);
        return response()->json($Product, 201);
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
    public function updateProduct(Product $product, Request $request)
    {
        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
            'sale_price' => $request->price - ($request->price * ($request->discount / 100)),
        ];
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $name = time() . $file->getClientOriginalName();
            $file_path = $request->file('thumb')->move('uploads/', $name);
            $path_name = $file_path->getPathname();
        }else{
            $path_name = $this->productRepo->find($product->id)->thumb;
        }
        $data['thumb'] = $path_name;
        return $product->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepo->delete($id);
        return response()->json(null, 201);
    }
    public function search($name)
    {
         return Product::where('name', 'LIKE', '%'  . $name . '%')->get();
    }
 
}
