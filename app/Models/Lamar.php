<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamar extends Model
{
    use HasFactory;

    protected $table = "lamars";
    protected $fillable = ['nama','tanggal_lahir','cv','kerja_id'];

    public function kerja(){
        return $this->belongsTo(Kerja::class);
    }
}
