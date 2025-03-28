<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidacy extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'candidacies';
    protected $guarded = ['id'];
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function province(){

        return $this->belongsTo(Province::class, 'province_id', 'ref');
    }
}
