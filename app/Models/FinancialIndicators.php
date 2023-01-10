<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialIndicators extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'financial_indicators';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        "company_id",
        "mount",
        "year",
        "budget",
        "fact",
        "forecast",
        "last_year",
        "type",
    ];


    protected $hidden=[
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }
}
