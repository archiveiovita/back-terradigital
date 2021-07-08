<?php

namespace App\Models;

use App\Base as Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    protected $fillable = [
                        'parent_id',
                        'alias',
                        'short_code',
                        'price',
                        'price_bottom',
                        'package_price_1',
                        'package_price_2',
                        'package_price_3',
                        'level',
                        'position',
                        'succesion',
                        'on_home',
                        'active',
                        'banner',
                        'type',
                        'image_left',
                        'image_right',
                        'stripe_product',
                        'stripe_price',
                    ];

    public function translations()
    {
        return $this->hasMany(BlogCategoryTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(BlogCategoryTranslation::class)->where('lang_id', self::$lang);
    }

    public function translationByLang($lang)
    {
        return $this->hasOne(BlogCategoryTranslation::class)->where('lang_id', $lang);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public function accordions()
    {
        return $this->hasMany(AccordionItem::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this
            ->hasMany(BlogCategory::class, 'parent_id')
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'desc');
    }

    public function subcategories()
    {
        return $this
            ->hasMany(BlogCategory::class, 'parent_id')
            ->where('type', '!=', 'service')
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'desc');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }

    // public function services()
    // {
    //     return $this
    //         ->hasMany(BlogCategory::class, 'parent_id')
    //         ->where('type', '=', 'service')
    //         ->orderBy('position', 'asc')
    //         ->orderBy('created_at', 'desc');
    // }

}
