<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use App\CPU\Helpers;

class Banner extends Model
{
    protected $casts = [
        'published'  => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'resource_id' => 'integer',
    ];

   

    public function translations()
    {
        return $this->morphMany('App\Model\Translation', 'translationable');
    }


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                if (strpos(url()->current(), '/api')){
                    return $query->where('locale', App::getLocale());
                }else{
                    return $query->where('locale', Helpers::default_lang());
                }
            }]);
        });
    }

}
