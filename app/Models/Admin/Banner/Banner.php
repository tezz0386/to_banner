<?php

namespace App\Models\Admin\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable=[
        'created_by',
        'heading',
        'summary',
        'image',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(Banner::class, 'created_by');
    }
}
