<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Defect extends Model
{
    use HasFactory;


    protected $table = 'defect';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];



    protected $fillable=[
        "name",
        "event",
        "name_product",
        "date_otk",
        "cover_sheet_number",
        "product_drawing",
        "name_operation",
        "code_operation",
        "quantity_operation",
        "au_per",
        "quantity_effective",
        "quantity_fail",
        "output_percentage_norm",
        "output_percentage_fact",
        "tnb",
        "other_defect",
        "date_defect",
        "regulatory_cost_rejected_product",
        "amount_defect_plan",
        "amount_defect_fact",
        "code_sto",
        "name_defect",
        "affiliation_defect",
        "sing_defect",
        "unit_detection_defect",
        "cause_defect",
        "name_culprit_defect",
    ];

    protected $hidden=[
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }
}
