<?php

namespace App\Models\Sellar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellar extends Model
{
    use HasFactory;

    protected $table = "sellar";

    protected $fillable = [
        "shopname",
        "BankAccountName",
        "accnum",
        "bankname",
        "branch",
        "user_id",
    ];

    public $timestamps = true;
}
