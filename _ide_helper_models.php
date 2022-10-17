<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\HrReportTypes
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newQuery()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withoutTrashed()
 * @mixin \Eloquent
 * @property int $report_type_id
 * @property string|null $text_1
 * @property string|null $text_2
 * @property string|null $text_3
 * @property string|null $text_4
 * @property string|null $date_1
 * @property string|null $date_2
 * @property string|null $date_3
 * @property string|null $date_4
 * @property string|null $report_day
 * @property int $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText4($value)
 */
	class HrReport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HrReportCovid
 *
 * @property int $id
 * @property int $company_id
 * @property int $n_1
 * @property int $n_2
 * @property int $n_3
 * @property int $n_4
 * @property int $n_5
 * @property int $n_6
 * @property int $n_7
 * @property int $n_9
 * @property string|null $report_day
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid newQuery()
 * @method static \Illuminate\Database\Query\Builder|HrReportCovid onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid query()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereReportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HrReportCovid withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HrReportCovid withoutTrashed()
 */
	class HrReportCovid extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HrReportTypes
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newQuery()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withoutTrashed()
 * @mixin \Eloquent
 * @property string $info
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereInfo($value)
 */
	class HrReportTypes extends \Eloquent {}
}

