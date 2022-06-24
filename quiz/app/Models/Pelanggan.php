<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "tb_pelanggan";
    protected $primaryKey = "pel_id";
    // $fillable digunakan untuk mendefinisikan attribute mana saja yang diizinkan untuk di assign menggunakan Mass Assignment
    // $guarded untuk mendefinisikan attribute mana saja yang tidak diizinkan untuk di assign menggunakan Mass Assignment.  
    protected $fillable = [
        "pel_no",
        "pel_nama",
        "pel_alamat",
        "pel_hp"
    ];
}