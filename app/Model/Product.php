<?php

namespace App\Model;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
    public function searchableAs()
    {
        return 'products';
    }
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
