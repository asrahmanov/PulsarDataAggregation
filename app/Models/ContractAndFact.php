<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ContractAndFact
 *
 * @property int $id
 * @property string $company_name
 * @property float $fact_1
 * @property float $plan_1
 * @property float $fact_2
 * @property float $plan_2
 * @property float $fact_3
 * @property float $plan_3
 * @property float $fact_4
 * @property float $plan_4
 * @property float $fact_5
 * @property float $plan_5
 * @property float $fact_6
 * @property float $plan_6
 * @property float $fact_7
 * @property float $plan_7
 * @property float $fact_8
 * @property float $plan_8
 * @property float $fact_9
 * @property float $plan_9
 * @property float $fact_10
 * @property float $plan_10
 * @property float $fact_11
 * @property float $plan_11
 * @property float $fact_12
 * @property float $plan_12
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContractAndFact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereFact9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact wherePlan9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractAndFact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ContractAndFact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContractAndFact withoutTrashed()
 * @mixin \Eloquent
 */
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
