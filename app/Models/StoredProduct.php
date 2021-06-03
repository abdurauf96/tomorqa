<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StoredProduct extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stored_products';

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
    protected $fillable = ['region_id', 'district_id', 'quarter_id', 'street_id', 'home_number', 'owner', 'firm_id', 'product_id', 'amount'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

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

    public function street()
    {
        return $this->belongsTo(Street::class);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
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
