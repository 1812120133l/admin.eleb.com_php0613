<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = ['shop_category_id','shop_name','shop_img','shop_rating','brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost','notice','discount','status'];

    public function category()
    {
        return $this->belongsTo(StopCategory::class,'shop_category_id','id');
    }
}
