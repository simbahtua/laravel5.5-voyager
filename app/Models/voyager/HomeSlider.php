<?php

namespace App\Models\voyager;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $fillable = [
        'title',
        'type',
        'value',
        'order',
    ];

    protected $table = 'app_home_sliders';

    public static function highestOrderMenuItem()
    {
        $order = 1;

        $item = AppHomeSlider::orderBy('order', 'DESC')
            ->first();

        if (!is_null($item)) {
            $order = intval($item->order) + 1;
        }

        return $order;
    }
}
