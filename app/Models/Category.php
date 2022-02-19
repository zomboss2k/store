<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['*'];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOME_ON = 1;
    const HOME_OFF = 0;

    // Trang thai 
    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-danger'
        ]

    ];

    // Trang thai 
    protected $home = [
        1 => [
            'name' => 'Hiện trang chủ',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Ẩn',
            'class' => 'label-danger'
        ]

    ];

    // Thay doi trang thai 
    public function getStatus()
    {
        return array_get($this->status, $this->c_active, '[N\A]');
    }

    // Thay doi trang thai cua danh muc
    public function getHome()
    {
        return array_get($this->home, $this->c_home, '[N\A]');
    }

     // Ham lay ten danhmuc va id
    public function products(){
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
