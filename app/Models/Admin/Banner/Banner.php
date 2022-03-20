<?php

namespace App\Models\Admin\Banner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Banner extends Model
{
    use HasFactory;
    protected $fillable=[
        'created_by',
        'heading',
        'summary',
        'image',
        'status',
        'button_text',
        'url',
    ];
    public function user()
    {
        return $this->belongsTo(Banner::class, 'created_by');
    }
}
