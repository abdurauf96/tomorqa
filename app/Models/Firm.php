<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Firm extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'firms';

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
    protected $fillable = ['region_id', 'district_id', 'name', 'bank', 'bank_currency', 'addres', 'director', 'phone', 'inn', 'hr', 'mfo', 'currency_mfo', 'currency_hr', 'status'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
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

    public static function boot(){
        parent::boot();

        static::deleting(function($firm){
            $firm->stored_products()->delete();
            $firm->planted_products()->delete();
            $firm->expected_products()->delete();
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
