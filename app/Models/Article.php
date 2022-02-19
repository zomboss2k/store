<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    // loi CSDL them s
    protected $table ='articles';
    
    const HOT = 1;

    // Trang thai hien thi bai viet
     protected $status = [
        1 => [
            'name' => 'Hiển thị',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Ẩn',
            'class' => 'label-default'
        ]
    ];

    // Trang thai bai viet noi bat
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

    // Thay doi trang thai hien thi, lay gia tri  
    public function getStatus(){
        return array_get($this->status,$this->a_active,'[N\A]');
    }

    // Thay doi trang thai hien thi, lay gia tri  
    public function getHot(){
        return array_get($this->hot,$this->c_hot,'[N\A]');
    }



}
