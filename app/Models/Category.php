<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    // protected $fillable = ['user_id'];

    // /**
    //  * Relació many-to-many amb Lang a través de CategoryLang.
    //  */
    // public function langs() : BelongsToMany
    // {
    //     return $this->belongsToMany(Lang::class, 'category_lang', 'category_id', 'lang_id');
    // }

    protected $fillable = ['name'];

    public function langs() : BelongsToMany
    {
        return $this->belongsToMany(Lang::class, 'category_lang', 'category_id', 'lang_id')
        ->withPivot('name', 'created_at', 'updated_at');
    }
}
