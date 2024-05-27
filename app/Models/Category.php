<?php

namespace App\Models;

use App\Functions\Core;
use App\Traits\HasSearch;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Category extends Model implements Sitemapable
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'name_en',
        'name_fr',
        'name_it',
        'name_sp',
        'description_en',
        'description_it',
        'description_it',
        'description_sp',
    ];

    protected $searchable = [
        'name_en',
        'name_fr',
        'name_it',
        'name_sp',
        'description_en',
        'description_it',
        'description_it',
        'description_sp',
    ];

    protected static function booted()
    {
        self::created(function ($Self) {
            Image::$FILE = request('image');
            $Self->Image()->create();
        });

        self::deleted(function ($Self) {
            Storage::disk('public')->delete(implode('/', [Image::$STORAGE, $Self->Image->storage]));
            $Self->Image->delete();
        });
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(url(route('views.guest.product', ['category' => $this->slug]), [], true))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.1);
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . Core::lang()};
    }

    public function Products()
    {
        return $this->hasMany(Product::class, 'category');
    }

    public function Image(): MorphOne
    {
        return $this->morphOne(Image::class, 'target');
    }
}
