<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }
    public function find($id){
        $product = $this->getModel()::with('category')->find($id);
        return $product;
    }
    public function get(){
        $product = $this->getModel()::paginate(6);
        return $product;
    }

}