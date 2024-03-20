<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
            'userId',
            'nickname',
            'livingIn',
            'aboutme',
            'photo',
            'education',
            'job',
            'salary',
            'willing2relocate',
            'profilepostedby',
            'maritalstatus',
            'noofmarriages',
            'children',
            'kids_staying_at',
            'like_to_have_children',
            'polygyny',
            'health',
            'pray',
            'languages',
            'origin',
            'haircolor',
            'bodytype',
            'height',
            'dresscode',
            'l4_atoll',
            'l4_island',
            'l4_age_range_start',
            'l4_age_range_end',
            'l4_willing2relocate',
            'l4_maritalstatus',
            'l4_noofmarriages',
            'l4_children',
            'l4_kids_staying_at',
            'l4_like_to_have_children',
            'l4_poligyny',
            'l4_languages',
            'l4_pray',
            'l4_origin',
            'l4_haircolor',
            'l4_bodytype',
            'l4_height',
            'l4_dresscode',
            'l4_profession',
            'l4_minimum_qualification',
            'l4_other',
    ];
}
