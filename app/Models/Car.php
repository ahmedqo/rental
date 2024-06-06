<?php

namespace App\Models;

use App\Functions\Core;
use App\Traits\HasSearch;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Car extends Model implements Sitemapable
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'brand',
        'price',
        'passengers',
        'doors',
        'cargo',
        'transmission',
        'fuel',
        'status',
        'promote',

        'slug',
        'name_en',
        'name_fr',
        'name_it',
        'name_sp',
        'details_en',
        'details_fr',
        'details_it',
        'details_sp',
        'description_en',
        'description_fr',
        'description_it',
        'description_sp',
    ];

    protected $searchable = [
        'price',
        'passengers',
        'doors',
        'cargo',
        'transmission',
        'fuel',

        'name_en',
        'name_fr',
        'name_it',
        'name_sp',

        'details_en',
        'details_fr',
        'details_it',
        'details_sp',

        'description_en',
        'description_fr',
        'description_it',
        'description_sp',

        'brand.name_en',
        'brand.name_fr',
        'brand.name_it',
        'brand.name_sp',

        'category.name_en',
        'category.name_fr',
        'category.name_it',
        'category.name_sp',
    ];

    protected static function booted()
    {
        self::created(function ($Self) {
            foreach (request('images') as $Image) {
                Image::$FILE = $Image;
                $Self->Images()->create();
            }
        });

        self::deleted(function ($Self) {
            $Self->Images->each(function ($Image) {
                Storage::disk('public')->delete(implode('/', [Image::$STORAGE, $Image->storage]));
                $Image->delete();
            });
        });
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(url(route('views.guest.show', $this->slug), [], true))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.1);
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }

    public function getDetailsAttribute()
    {
        return $this->{'details_' . Core::lang()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . Core::lang()};
    }

    public function getDetailsArrayAttribute()
    {
        return $this->details ? preg_split("/\n\r|\n/", $this->details) : null;
    }

    public function getRatingAttribute()
    {
        $rev =  $this->Reviews->where('status', 'approved');
        return $rev->sum('rate') / $rev->count();
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class, 'car');
    }

    public function Reviews()
    {
        return $this->hasMany(Review::class, 'car');
    }

    public function Images(): MorphMany
    {
        return $this->morphMany(Image::class, 'target');
    }
}
