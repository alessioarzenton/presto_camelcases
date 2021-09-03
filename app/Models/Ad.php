<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ad extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title','body', 'category_id','price','user_id'];

    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'id' => $this->id,

            'title' => $this -> title,
            'body' => $this -> body,
            'altro' => 'annunci annuncio ad ads',
            'category' => $category,

        ];

        return $array;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(AdImage::class);
    }

    static public function ToBeRevisionCount()
    {
        return Ad::where('is_accepted',null)->count();
    }
}
