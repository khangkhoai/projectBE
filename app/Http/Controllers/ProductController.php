<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function index()
    {
        $products = $this->productRepo->getAll();
        return response()->json($products, 201);
        
    }

    public function show($id)
    {
        $products = $this->productRepo->find($id);

        return response()->json($products, 201);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $products = $this->productRepo->create($data);

        return response()->json($products, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $products = $this->productRepo->update($id, $data);

        return response()->json($products, 201);
    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);
        return response()->json(null, 201);
    }
}