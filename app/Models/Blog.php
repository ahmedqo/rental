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

class Blog extends Model implements Sitemapable
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'title_en',
        'title_fr',
        'title_it',
        'title_sp',
        'details_en',
        'details_fr',
        'details_it',
        'details_sp',
        'content_en',
        'content_fr',
        'content_it',
        'content_sp',
    ];

    protected $searchable = [
        'title_en',
        'title_fr',
        'title_it',
        'title_sp',

        'details_en',
        'details_fr',
        'details_it',
        'details_sp',

        'content_en',
        'content_fr',
        'content_it',
        'content_sp',
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
        return Url::create(url(route('views.guest.blog', $this->slug), [], true))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.1);
    }

    public function getTitleAttribute()
    {
        return $this->{'title_' . Core::lang()};
    }

    public function getDetailsAttribute()
    {
        return $this->{'details_' . Core::lang()};
    }

    public function getcontentAttribute()
    {
        return $this->{'content_' . Core::lang()};
    }

    public function Image(): MorphOne
    {
        return $this->morphOne(Image::class, 'target');
    }
}
