<?php

namespace App\Models;

use App\Models\Dir\DirBiospecimenType;
use App\Models\Dir\DirContainerQc;
use App\Models\Dir\DirContainerType;
use App\Models\Dir\DirFfpeType;
use App\Models\Dir\DirFillType;
use App\Models\Dir\DirGlassType;
use App\Models\Dir\DirMaterialQc;
use App\Models\Dir\DirMaterialStorageType;
use App\Models\Dir\DirMeasurementUnit;
use App\Models\Dir\DirNameEquipment;
use App\Models\Dir\DirPaintingType;
use App\Models\Dir\DirProcessingType;
use App\Models\Dir\DirRegistrationQc;
use App\Models\Dir\DirSampleType;
use App\Models\QC\QC;
use Database\Seeders\DirRegistrationQcSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * App\Models\SampleShort
 *
 * @property int $id
 * @property string $barcode Баркод
 * @property string $create_date Дата заведения образца
 * @property int $status_id Статус
 * @property int|null $container_type_id Тип контейнера забора
 * @property int|null $storage_container_type_id Тип контейнера хранения
 * @property string|null $culling_reason Причина выбраковки (при регистрации)
 * @property string|null $aliquot_size Объем материала в контейнере (Объем аликвторирования/размер аликвтоы)
 * @property int|null $processing_type_id Вид процессинга
 * @property string|null $client_feedback Отметка о качестве (от заказчика, после получения)
 * @property int|null $material_storage_type_id Тип хранения материала
 * @property int|null $name_equipment_id Название оборудования
 * @property int|null $fill_type_id Тип заливки (раствора для хранения ткани)
 * @property string|null $tissue_width Ширина ткани
 * @property string|null $tissue_height Высота ткани
 * @property string|null $tissue_length Длина ткани
 * @property string|null $tissue_weight Вес ткани
 * @property string|null $slice_count Количество срезов
 * @property int|null $measurement_unit_id Единица измерения
 * @property int|null $ffpe_type_id Способ забора образца (FFPE type)
 * @property string|null $individ_site_label Индивидуальная маркировка сайтов
 * @property int|null $glass_type_id Тип стекла
 * @property string|null $glass_block_barcode Баркод блока
 * @property int|null $painting_type_id Тип окраски
 * @property string|null $antibodies Антитела
 * @property string|null $thickness_slice_on_glass Толщина среза на стекле
 * @property string|null $transaction_time Время проводки
 * @property string|null $max_delivery_time Время, за которое необходимо доставить материал с момента операции
 * @property string|null $comment Комментарий
 * @property int|null $sample_type_id Тип образца
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $old_qc_status Старый статус qc
 * @property int|null $storage_id
 * @property int|null $registration_qc_id Оценка при регистрации
 * @property int|null $container_biospecimen_type_id Тип контейнера забора (тип материала)
 * @property int|null $container_fill_type_id Тип контейнера забора  (тип сохранения)
 * @property int|null $storage_container_biospecimen_type_id Тип контейнера хранения (тип материала)
 * @property int|null $storage_container_fill_type_id Тип контейнера хранения  (тип сохранения)
 * @property string|null $entrance_date Дата и время поступления образца
 * @property string|null $arrival_date Дата и время получения
 * @property string|null $taking_date Дата и время забора
 * @property string|null $entry_date Дата и время внесения
 * @property string|null $customer_marking Маркировка заказчика
 * @property string|null $request_uuid
 * @property int|null $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CaseModel[] $cases
 * @property-read int|null $cases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sample[] $derivateSamples
 * @property-read int|null $derivate_samples_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GroupsProject[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|QC[] $qc
 * @property-read int|null $qc_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sample[] $sourceSamples
 * @property-read int|null $source_samples_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sample[] $sourceSamplesBarcodes
 * @property-read int|null $source_samples_barcodes_count
 * @property-read \App\Models\Storage|null $storage
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort newQuery()
 * @method static \Illuminate\Database\Query\Builder|SampleShort onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort query()
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereAliquotSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereAntibodies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereClientFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereContainerBiospecimenTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereContainerFillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereContainerTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereCullingReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereCustomerMarking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereEntranceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereEntryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereFfpeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereFillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereGlassBlockBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereGlassTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereIndividSiteLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereMaterialStorageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereMaxDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereMeasurementUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereNameEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereOldQcStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort wherePaintingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereProcessingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereRegistrationQcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereRequestUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereSampleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereSliceCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereStorageContainerBiospecimenTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereStorageContainerFillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereStorageContainerTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereStorageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereTakingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereThicknessSliceOnGlass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereTissueHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereTissueLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereTissueWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereTissueWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleShort whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SampleShort withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SampleShort withoutTrashed()
 * @mixin \Eloquent
 */
class SampleShort extends Model
{
    use HasFactory;
    use SoftDeletes;
//    use Searchable;

    protected $table = 'samples';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'barcode',
//        'parent_sample_id',
        'create_date',
        'status_id',
//        'container_type_id',
////        'container_volume',
////        'container_qc_id',
        'storage_container_type_id',
////        'storage_container_volume',
////        'storage_container_qc_id',
////        'comment_qc',
        'culling_reason',
        'aliquot_size',
////        'material_qc_id',
////        'material_volume_qc',
        'processing_type_id',
        'client_feedback',
        'material_storage_type_id',
        'name_equipment_id',
        'fill_type_id',
        'tissue_width',
        'tissue_height',
        'tissue_length',
        'slice_count',
        'measurement_unit_id',
        'ffpe_type_id',
        'individ_site_label',
////        'histo_number',
        'glass_type_id',
        'glass_block_barcode',
        'painting_type_id',
        'antibodies',
        'thickness_slice_on_glass',
        'transaction_time',
        'max_delivery_time',
        'comment',
        'sample_type_id',
        'storage_id',

        'registration_qc_id',
//        'container_biospecimen_type_id',
//        'container_fill_type_id',
        'storage_container_biospecimen_type_id',
        'storage_container_fill_type_id',
        'entrance_date',
        'arrival_date',
        'taking_date',
        'entry_date',
        'customer_marking',
        'request_uuid'
    ];

    protected $hidden=[
        'pivot'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [
            'barcode'=>'string'.($create?'|unique:'.uniqueByModel(Sample::class):''),
            'parent_sample_id'=>'numeric|exists:'.existByModel(Sample::class),
            'create_date'=>'date|required',
            'status_id'=>'required|exists:dir_sample_statuses,id',
//            'container_type_id'=>'numeric|exists:'.existByModel(DirContainerType::class),
            'storage_container_type_id'=>'numeric|exists:'.existByModel(DirContainerType::class),
            'culling_reason'=>'string',
            'aliquot_size'=>'nullable|string',
            'processing_type_id'=>'numeric|exists:'.existByModel(DirProcessingType::class),
            'client_feedback'=>'string',
            'material_storage_type_id'=>'numeric|exists:'.existByModel(DirMaterialStorageType::class),
            'name_equipment_id'=>'numeric|exists:'.existByModel(DirNameEquipment::class),
            'fill_type_id'=>'numeric|exists:'.existByModel(DirFillType::class),
            'tissue_width'=>'string',
            'tissue_height'=>'string',
            'tissue_length'=>'string',
            'slice_count'=>'string',
            'measurement_unit_id'=>'numeric|exists:'.existByModel(DirMeasurementUnit::class),
            'ffpe_type_id'=>'nullable|numeric|exists:'.existByModel(DirFfpeType::class),
            'individ_site_label'=>'string',
            'glass_type_id'=>'numeric|exists:'.existByModel(DirGlassType::class),
            'glass_block_barcode'=>'string',
            'painting_type_id'=>'numeric|exists:'.existByModel(DirPaintingType::class),
            'antibodies'=>'string',
            'thickness_slice_on_glass'=>'string',
            'transaction_time'=>'string',
            'max_delivery_time'=>'string',
            'comment'=>'nullable|string',
            'sample_type_id'=>'numeric|exists:'.existByModel(DirSampleType::class),
            'storage_id'=>'nullable|exists:'.existByModel(Storage::class),

            'registration_qc_id'=>'nullable|exists:'.existByModel(DirRegistrationQc::class),
//            'container_biospecimen_type_id'=>'nullable|exists:'.existByModel(DirBiospecimenType::class),
//            'container_fill_type_id'=>'nullable|exists:'.existByModel(DirFillType::class),
            'storage_container_biospecimen_type_id'=>'nullable|exists:'.existByModel(DirBiospecimenType::class),
            'storage_container_fill_type_id'=>'nullable|exists:'.existByModel(DirFillType::class),
            'entrance_date'=>'nullable',
            'arrival_date'=>'nullable',
            'taking_date'=>'nullable',
            'entry_date'=>'nullable',
            'customer_marking'=>'nullable|string',
//            'request_uuid'=>'nullable|string'
        ]);
    }

        public function groups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
            return $this->belongsToMany(GroupsProject::class,'sample_group','sample_id','group_id');
        }

        public function cases(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
                return $this->belongsToMany(CaseModel::class,'sample_case','sample_id','case_id');
        }


        public function sourceSamples(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
            return $this->belongsToMany(Sample::class,'sample_source_sample','sample_id','source_sample_id');
        }

        public function derivateSamples()
        {
            return $this->belongsToMany(Sample::class,'sample_source_sample','source_sample_id','sample_id');
        }

        public function sourceSamplesBarcodes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
            return $this->belongsToMany(Sample::class,'sample_source_sample','sample_id','source_sample_id');
        }

        public function qc(){
        return $this->hasMany(QC::class,'sample_id','id');
        }

        public function storage(){
            return $this->belongsTo(Storage::class);
        }


}
