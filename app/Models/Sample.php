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
 * App\Models\Sample
 *
 * @property int $id
 * @property string $barcode Баркод
 * @property string $create_date Дата заведения образца
 * @property int $status_id Статус
 * @property int $container_type_id Тип контейнера забора
 * @property string|null $container_volume Объем контейнера забора (QC)
 * @property int|null $container_qc_id Оценка контейнера забора (QC)
 * @property int|null $storage_container_type_id Тип контейнера хранения
 * @property string $storage_container_volume Объем контейнера хранения (QC)
 * @property int|null $storage_container_qc_id Оценка контейнера хранения (QC)
 * @property string|null $comment_qc QC комментарий (при регистрации)
 * @property string|null $culling_reason Причина выбраковки (при регистрации)
 * @property string|null $aliquot_size Объем материала в контейнере (Объем аликвторирования/размер аликвтоы)
 * @property int $material_qc_id Оценка качества материала {QC)
 * @property string|null $material_volume_qc Оценка объема материала
 * @property int|null $processing_type_id Вид процессинга
 * @property string|null $client_feedback Отметка о качестве (от заказчика, после получения)
 * @property int $material_storage_type_id Тип хранения материала
 * @property int|null $name_equipment_id Название оборудования
 * @property int|null $fill_type_id Тип заливки (раствора для хранения ткани)
 * @property string|null $tissue_width Ширина ткани
 * @property string|null $tissue_height Высота ткани
 * @property string|null $tissue_length Длина ткани
 * @property string|null $slice_count Количество срезов
 * @property int|null $measurement_unit_id Единица измерения
 * @property int|null $ffpe_type_id Способ забора образца (FFPE type)
 * @property string|null $individ_site_label Индивидуальная маркировка сайтов
 * @property string|null $histo_number Гистономер
 * @property int|null $glass_type_id Тип стекла
 * @property int|null $painting_type_id Тип окраски
 * @property string|null $antibodies Антитела
 * @property string|null $thickness_slice_on_glass Толщина среза на стекле
 * @property string|null $transaction_time Время проводки
 * @property string|null $max_delivery_time Время, за которое необходимо доставить материал с момента операции
 * @property string|null $comment Комментарий
 * @property string|null $cidp CIDP
 * @property int|null $sample_type_id Тип образца
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CaseModel[] $cases
 * @property-read int|null $cases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sample newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sample newQuery()
 * @method static \Illuminate\Database\Query\Builder|Sample onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sample query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereAliquotSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereAntibodies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCidp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereClientFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCommentQc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereContainerQcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereContainerTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereContainerVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCullingReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereFfpeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereFillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereGlassTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereHistoNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereIndividSiteLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereMaterialQcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereMaterialStorageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereMaterialVolumeQc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereMaxDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereMeasurementUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereNameEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample wherePaintingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereProcessingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereSampleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereSliceCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStorageContainerQcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStorageContainerTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStorageContainerVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereThicknessSliceOnGlass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereTissueHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereTissueLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereTissueWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Sample withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sample withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $tissue_weight Вес ткани
 * @property string|null $glass_block_barcode Баркод блока
 * @property-read \Illuminate\Database\Eloquent\Collection|Sample[] $childrenSamples
 * @property-read int|null $children_samples_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GroupsProject[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $project
 * @property-read int|null $project_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Sample[] $sourceSamples
 * @property-read int|null $source_samples_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereGlassBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereGlassBlockBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereTissueWeight($value)
 * @property string|null $old_qc_status Старый статус qc
 * @property int|null $storage_id
 * @property-read \Illuminate\Database\Eloquent\Collection|QC[] $qc
 * @property-read int|null $qc_count
 * @property-read \App\Models\Storage|null $storage
 * @method static \Database\Factories\SampleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereOldQcStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStorageId($value)
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
 * @property-read \Illuminate\Database\Eloquent\Collection|Sample[] $derivateSamples
 * @property-read int|null $derivate_samples_count
 * @property-read mixed $derivate_samples_barcodes
 * @property-read mixed $source_samples_ids
 * @property-read \Illuminate\Database\Eloquent\Collection|Sample[] $sourceSamplesBarcodes
 * @property-read int|null $source_samples_barcodes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereContainerBiospecimenTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereContainerFillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCustomerMarking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereEntranceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereEntryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereRegistrationQcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereRequestUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStorageContainerBiospecimenTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereStorageContainerFillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereTakingDate($value)
 */
class Sample extends SampleShort
{
        protected $appends = ['source_samples_ids','derivate_samples_barcodes'];

        public function getSourceSamplesIdsAttribute()
        {
            return $this->belongsToMany(Sample::class,'sample_source_sample','sample_id','source_sample_id')->distinct()->pluck('id');
        }

        public function getDerivateSamplesBarcodesAttribute()
        {
            return $this->belongsToMany(Sample::class,'sample_source_sample','source_sample_id','sample_id')->distinct()->pluck('barcode');
        }

}
