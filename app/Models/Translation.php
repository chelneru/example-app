<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Translation extends Model
{
    use HasFactory;
    protected $table = 'translations';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'type', 'language'];

    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeOfLanguage($query, $language) {
        return $query->where('language', $language);

    }

}
