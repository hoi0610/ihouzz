<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected $is_deleted           = false;
    protected $status_column        = 'status';
    protected $is_deleted_column    = 'is_deleted';
    protected $shouldSelect         = ['*']; //mặc định select *
    protected $locale_column        = 'locale';
    protected $joinLocaleKey        = false;

    public function scopeNotDeleted($query,$table=null)
    {
        if(!$this->is_deleted){
            return;
        }
        $table = $table?$table:$this->table;
        return $query->where($table.'.'.$this->is_deleted_column,0);
    }

    public function scopeActive($query,$table=null)
    {
        $table = $table?$table:$this->table;
        return $query->where($table.'.'.$this->status_column,1)->notDeleted();
    }

    public function scopeShouldSelect($query)
    {
        return $query->addSelect($this->getShouldSelect($this));
    }

    public function scopeLocale($query,$locale=null){
        $localeModel = app()->make(
            $this->localeModel()
        );

        $joinLocaleKey = $localeModel->joinLocaleKey;
        if(!$joinLocaleKey){
            $joinLocaleKey = $localeModel->primaryKey;
        }

        if(!$locale){
            $locale = config('app.locale');
        }

        return $query->leftJoin($localeModel->table,function($join) use ($localeModel,$joinLocaleKey,$locale){
            $join->on($localeModel->table.".".$joinLocaleKey, '=', $this->table.'.'.$this->primaryKey);
            $join->where($localeModel->table.".".$this->locale_column, $locale);
        })->addSelect($this->getShouldSelect($localeModel));
    }

    private function getShouldSelect($model){
        $result = [];
        foreach($model->shouldSelect as $field){
            $result[] = $model->table.'.'.$field;
        }

        return $result;
    }
}
