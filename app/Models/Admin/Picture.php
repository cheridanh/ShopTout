<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;

    public $fillable = ['filename'];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (Picture $picture) {
            Storage::disk('public')->delete($picture->filename);
        });
    }

    public function getImageUrl() : string
    {
        return Storage::disk('public')->url($this->filename);
    }
}
