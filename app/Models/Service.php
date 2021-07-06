<?php
namespace App\Models;

use App\Base as Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['parent_id', 'service_id', 'key'];

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class, 'service_id', 'id');
    }

    public function translation()
    {
        return $this->hasOne(ServiceTranslation::class , 'service_id')->where('lang_id', self::$lang);
    }

    public function children()
    {
        return $this
            ->hasMany(ServiceTranslation::class, 'parent_id')
            ->orderBy('created_at', 'desc');
    }
}
