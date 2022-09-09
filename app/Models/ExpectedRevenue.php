<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExpectedRevenue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'expected_revenue';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        "company_name",
        "company_id",
        "year",
        "mount",
        "sum",
    ];

    protected $hidden=[
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }
}
