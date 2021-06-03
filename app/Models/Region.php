<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Region extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';

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
    protected $fillable = ['name'];

    public function firms()
    {
        return $this->hasMany(Firm::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function quarters()
    {
        return $this->hasMany(Quarter::class);
    }

    public function streets()
    {
        return $this->hasMany(Street::class);
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

        static::deleting(function($region) {
             $region->firms()->delete();
             $region->districts()->delete();
             $region->quarters()->delete();
             $region->streets()->delete();
             $region->homes()->delete();
             $region->stored_products()->delete();
             $region->planted_products()->delete();
             $region->expected_products()->delete();
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
