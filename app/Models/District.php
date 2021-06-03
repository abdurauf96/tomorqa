<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class District extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'districts';

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
    protected $fillable = ['region_id', 'name'];

    public function firms()
    {
        return $this->hasMany(Firm::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
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

        static::deleting(function($district) {
             $district->firms()->delete();
             $district->quarters()->delete();
             $district->streets()->delete();
             $district->homes()->delete();
             $district->stored_products()->delete();
             $district->planted_products()->delete();
             $district->expected_products()->delete();
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
