<?php


namespace App\Services;


use Illuminate\Support\Facades\App;

class GetImageName
{
    const ARTICLE_STORAGE_PATH = "/storage/articles/";
    const SAMPLE_STORAGE_PATH = "/storage/samples/";

    public static function articleImage($imagePath)
    {


        $path = env('APP_URL') . self::ARTICLE_STORAGE_PATH;
        return $image = str_replace($path, '', $imagePath);
    }


    public static function sampleMainImage($imagePath)
    {
       
        $path = env('APP_URL') .self::SAMPLE_STORAGE_PATH;
        return $image = str_replace($path, '', $imagePath);
    }

    public static function sampleMultiImage($images)
    {

        $img_array = array();
        $image_name_array = array();
        array_push($img_array,
            $images->input('image1'),
            $images->input('image2'),
            $images->input('image3'),
            $images->input('image4'));


        $path = env('APP_URL') . self::SAMPLE_STORAGE_PATH;
        $array_count = count($img_array);
        for ($i = 0; $i < $array_count; $i++) {
            array_push($image_name_array, str_replace($path, '', $img_array[$i]));
        }
        return $image_collection = collect($image_name_array);
    }


}
