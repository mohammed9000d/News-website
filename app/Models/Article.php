<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeSearch($q, $request) {
        if($request->has('title') && $request->title) {
            $q->where('title', 'like', '%'.$request->title.'%');
        }
        if($request->has('category_id') && $request->category_id) {
            $q->where('category_id', 'like', '%'.$request->category_id.'%');
        }
    }
}
