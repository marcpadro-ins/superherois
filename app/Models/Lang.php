<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lang extends Model
{
    use HasFactory;

    // protected $fillable = ['code'];

    // /**
    //  * Relació many-to-many amb Category a través de CategoryLang.
    //  */
    // public function categories() : BelongsToMany
    // {
    //     return $this->belongsToMany(Category::class, 'category_lang', 'lang_id', 'category_id');
    // }

    protected $fillable = ['code', 'name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
