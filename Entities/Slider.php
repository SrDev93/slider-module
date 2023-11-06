<?php

namespace Modules\Sliders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'background', 'image', 'active'];

    protected static function newFactory()
    {
        return \Modules\Sliders\Database\factories\SliderFactory::new();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($slider){
            if ($slider->background){
                File::delete($slider->background);
            }

            if ($slider->image){
                File::delete($slider->image);
            }
        });
    }
}
