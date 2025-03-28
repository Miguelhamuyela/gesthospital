<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Legislation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'legislations';

    public $fillable = [ 'legislation', 'title', 'file'  ];
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
