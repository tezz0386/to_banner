<?php

namespace App\Models\Admin\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
    	'name',
        'quotation',
    	'icon',
    	'logo',
    	'email',
    	'contact_no',
    	'location',
    	'address',
    	'facebook_link',
    	'twitter_link',
    	'google_link',
    	'youtube_link',
    	'linkedin_link',
    ];
}
