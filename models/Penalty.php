<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    public $table = 'penalties';

    protected $guarded;

    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
