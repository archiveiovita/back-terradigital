<?php

namespace App\Models;

use App\Base as Model;

class BlogCategoryTranslation extends Model
{
    protected $table = 'blog_categories_translation';

    protected $fillable = [
                        'lang_id',
                        'blog_category_id',
                        'name',
                        'descrition',
                        'banner_desktop',
                        'banner_mobile',
                        'seo_text',
                        'seo_title',
                        'seo_description',
                        'seo_keywords',
                        'link',
                        'price_top_begin',
                        'price_top_end',
                        'price_bottom_begin',
                        'price_bottom_end',
                        'package_1',
                        'package_2',
                        'package_3',
                        'bot_message'
                    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
