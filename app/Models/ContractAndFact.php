<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractAndFact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contract_and_fact';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        "company_name",
        "fact_1",
        "plan_1",
        "fact_2",
        "plan_2",
        "fact_3",
        "plan_3",
        "fact_4",
        "plan_4",
        "fact_5",
        "plan_5",
        "fact_6",
        "plan_6",
        "fact_7",
        "plan_7",
        "fact_8",
        "plan_8",
        "fact_9",
        "plan_9",
        "fact_10",
        "plan_10",
        "fact_11",
        "plan_11",
        "fact_12",
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
