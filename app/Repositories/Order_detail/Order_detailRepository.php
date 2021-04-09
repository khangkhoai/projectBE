<?php
namespace App\Repositories\Order_detail;

use App\Repositories\BaseRepository;

class Order_detailRepository extends BaseRepository implements Order_detailRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Order_detail::class;
    }

}