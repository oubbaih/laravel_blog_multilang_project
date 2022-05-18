<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['logo', 'favicon', 'instagram', 'tiktok', 'twitter', 'gmail', 'youtube'];

    public static function checkSettings()
    {
        $settings = self::all();
        if (count($settings) < 1) {
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
