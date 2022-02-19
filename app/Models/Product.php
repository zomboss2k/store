<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // trạng thái công khai, riêng tư
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
  
    //trạng thái nổi bật
    const HOT_ON =1;
    const HOT_OFF =0;

    protected $quarded = [
        
    ];

   
    // Trang thai hiển thị sản phẩm
    protected $status = [
        1 => [
            'name' => 'Công khai',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Riêng tư',
            'class' => 'label-default'
        ]
    ];
    
    // Trang thái sản phẩm nổi bật
    protected $hot = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'label-success'
        ]
    ];

    // Thay doi trang thai cua danh muc
    public function getStatus(){
        return array_get($this->status,$this->pro_active,'[N\A]');
    }
    
    // Thay doi trang thai cua hot
    public function getHot(){
        return array_get($this->hot,$this->pro_hot,'[N\A]');
    }

    // Ham lay ten danhmuc va id
    public function category(){
        return $this->belongsTo(Category::class,'pro_category_id');
    }

}
