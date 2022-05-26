<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['image'];


    public static function checkAboutPage()
    {
        $about = self::all();
        if (count($about) < 1) {
            $data = [
                'id' => 1
            ];
            foreach (config('app.languages') as $key => $value) {
                $data[$key]['title'] = $value;
                $data[$key]['content'] = $value;
            }
            self::create($data);
        }
        return self::first();
    }
}
