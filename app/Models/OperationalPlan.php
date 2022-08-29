<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationalPlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'operational_plan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        "company_name",
        "short_name",
        "plan_1",
        "plan_2",
        "plan_3",
        "plan_4",
        "plan_5",
        "plan_6",
        "plan_7",
        "plan_8",
        "plan_9",
        "plan_10",
        "plan_11",
        "plan_12",
    ];

    protected $hidden=[
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }
}
