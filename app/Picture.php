<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Picture extends Model
{

    protected $fillable = ['picture', 'title', 'description'];

    public static $arrayColors = [
        'red' => [255, 0, 0],
        'blue' => [0, 0, 255],
        'black' => [0, 0, 0],
        'orange' => [255, 165, 0]
    ];

    public static $arrayFonts = [
        '1' => '/fonts/arial.ttf',
        '2' => '/fonts/assun.ttf',
        '3' => '/fonts/db.otf',
        '4' => '/fonts/hil.ttf'
    ];

    /**
     * @param $file
     * @param $title
     * @param $description
     * @return mixed
     */
    public static function upload($file, $title, $description)
    {
        $path = public_path().'/uploads/';
        $filename = Str::random(10) .'.' . $file->getClientOriginalExtension();
        $picture = Image::make($file);
        $picture->save($path . $filename);

         $picture = static::create([
            'picture' => $filename,
            'title' => $title,
            'description' => $description,
        ]);

         return $picture;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return '/uploads/' . $this->picture;
    }

    /**
     * @param $picture
     * @param $text
     * @param $selectedColor
     * @param $selectedFont
     * @return bool
     */
    public static function writeText($picture, $text, $selectedColor, $selectedFont)
    {
        $color = static::$arrayColors[$selectedColor];
        $font = static::$arrayFonts[$selectedFont];
        /* определяем место размещения текста по вертикали и горизонтали */
        $height = 50; //высота
        $width = 50; //ширина
        $image = public_path() . '/uploads/' . $picture;
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        switch ($extension) {
            case "gif":
                $newPicture = imagecreatefromgif($image);
                Header("Content-type: image/gif"); //указываем на тип передаваемых данных
                $color = ImageColorAllocate($newPicture, $color[0], $color[1], $color[2]); //получаем идентификатор цвета
                /* выводим текст на изображение */
                ImageTTFtext($newPicture, 25, 0, $width, $height, $color, public_path() . $font, $text);
                Imagegif($newPicture, $image); //сохраняем рисунок в формате JPEG
                break;
            case "jpg" :
            case "jpeg":
                $newPicture = ImageCreateFromjpeg($image);
                Header("Content-type: image/jpeg");
                $color = ImageColorAllocate($newPicture, $color[0], $color[1], $color[2]);
                ImageTTFtext($newPicture, 25, 0, $width, $height, $color, public_path() . $font, $text);
                Imagejpeg($newPicture, $image);
                break;
            case "png":
                $newPicture = imagecreatefrompng($image);
                Header("Content-type: image/png");
                $color = ImageColorAllocate($newPicture, $color[0], $color[1], $color[2]);
                ImageTTFtext($newPicture, 25, 0, $width, $height, $color, public_path() . $font, $text);
                Imagepng($newPicture, $image);
                break;

            default:
                return false;
        }
        ImageDestroy($newPicture); //освобождаем память и закрываем изображение
    }
}
