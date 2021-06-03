<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Street extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'streets';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'district_id', 'quarter_id', 'name'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class);
    }

    public function homes()
    {
        return $this->hasMany(Home::class);
    }

    public function stored_products()
    {
        return $this->hasMany(StoredProduct::class);
    }
    
    public function planted_products()
    {
        return $this->hasMany(PlantedProduct::class);
    }

    public function expected_products()
    {
        return $this->hasMany(ExpectedProduct::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($street) {
             $street->homes()->delete();
             $street->stored_products()->delete();
             $street->planted_products()->delete();
             $street->expected_products()->delete();
        }); 
    }

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
