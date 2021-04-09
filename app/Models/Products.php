<?php
namespace App\Models;

class Products extends BaseModel
{
    protected $is_deleted   = true;
    protected $table        = 'products';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'pos_id',
        'employee_in_charge',
        'code',
        'name',
        'product_type_id',
        'product_status_id',
        'product_category_id',
        'product_direction_id',
        'product_unit_id',
        'land_type_id',
        'description',
        'content',
        'image',
        'image_url',
        'province_id',
        'district_id',
        'ward_id',
        'street',
        'apartment_number',
        'road_width',
        'acreage',
        'price',
        'list_price',
        'embed_map',
        'longitude',
        'latitude',
        'date_public',
        'position',
        'bedroom',
        'bathroom',
        'land_width',
        'land_length',
        'land_backside',
        'land_area',
        'land_planning_width',
        'land_planning_length',
        'land_planning_backside',
        'land_planning_area',
        'floor_area',
        'floor',
        'landlord_name',
        'landlord_phone',
        'is_hide_landlord',
        'map_sheet',
        'parcel_of_land',
        'status',
        'is_hot',
        'is_new',
        'is_show_gift',
        'is_good_price',
        'is_survey',
        'is_furniture',
        'is_deleted',
        'created_by',
        'updated_by'
    ];

    public function images() {
        return $this->hasMany(ProductsImages::class , 'product_id');
    }

    public function legal_documents() {
        return $this->belongsToMany(LegalDocuments::class, 'products_legal_documents', 'product_id', 'legal_document_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }

    public function direction() {
        return $this->belongsTo(ProductDirections::class, 'product_direction_id');
    }

    public function Status() {
        return $this->belongsTo(ProductStatus::class, 'product_status_id');
    }

    public function agent() {
        return $this->belongsTo(Agents::class, 'agent_id');
    }

    public function type() {
        return $this->belongsTo(ProductTypes::class, 'product_type_id');
    }

    public function unit() {
        return $this->belongsTo(ProductUnits::class, 'product_unit_id');
    }

    public function land_types() {
        return $this->belongsTo(LandTypes::class);
    }

    public function ward() {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function features() {
        return $this->belongsToMany(ProductsFeatures::class, 'products_features_values', 'product_id', 'feature_id');
    }

    public function variants() {
        return $this->belongsToMany(ProductsFeaturesVariants::class, 'products_features_values', 'product_id', 'variant_id');
    }

}
