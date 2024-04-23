<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'sold',
    ];
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class);
    }
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }
    public function getSlug(): string
    {
        return Str::slug($this->name);
    }
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }
    public function attachFiles(array $files)
    {
        $pictures = [];
        foreach ($files as $file) {
            if($file->getError()) {
                continue;
            }
            $fileName = $file->store('articles/' . $this->id, 'public');
            $pictures[] = [
                'filename' => $fileName,
            ];
        }
        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }
    public function getPicture() : ?Picture
    {
        return $this->pictures[0] ?? null;
    }
}
