<?php
namespace LaravelMenu\model;


use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{

    public $timestamps = false;

    protected $table = 'menu';

    protected $fillable = array('parent_id','title','slug','sort_order');

    public function parent() {

        return $this->hasOne('laravelMenu\model\MenuModel', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('laravelMenu\model\MenuModel', 'parent_id', 'id');

    }

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', 0)->get();

    }
}
