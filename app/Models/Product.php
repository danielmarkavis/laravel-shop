<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sku'
    ];

    protected $appends = [
        'image',
    ];

    protected $casts = [
        'price' => 'float'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('product_image')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('product_thumbnail')
            ->width(250);
    }

    public function getVariantSkusAttribute(): Collection
    {
        return $this->variants()->pluck('sku');
    }

    public function variants(): HasMany
    {
        return $this
            ->HasMany(Variant::class);
    }

    public function getImageAttribute(): ?object
    {
        if (!$this->hasMedia()) {
            return null;
        }

        $media = $this->getFirstMedia();
        $isSVG = $media?->mime_type === 'image/svg+xml';

        return (object)[
            'id' => $media->id,
            'url' => $media->getUrl(),
            'thumbnail' => $isSVG ? $media->getUrl() : $media->getUrl('product_thumbnail'),
            'mime_type' => $media->getTypeFromMime()
        ];
    }
}
