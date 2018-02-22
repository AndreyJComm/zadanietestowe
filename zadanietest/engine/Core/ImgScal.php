<?php
/**
 * Created by PhpStorm.
 * User: anmk
 * Date: 22.02.2018
 * Time: 09:54
 */

namespace Engine\Core;

class ImgScal
{
    private $target_dir;

    public function __construct()
    {
        $this->target_dir = "uploads/";
    }

    public function Scal($image, $height, $width, $logger)
    {

        $check = getimagesize($image["tmp_name"]);

        $logger->info("Dostalem zdjecie:", ['Nazwa Pliku:' => $image["name"], 'Wymiary: ' => [$check[0], $check[1]]]);


        list($width_orig, $height_orig) = getimagesize($image["tmp_name"]);
        $image_b = imagecreatefromjpeg($image["tmp_name"]);
        $image_p = imagecreatetruecolor($height,$width);
        imagecopyresized($image_p, $image_b, 0, 0, 0, 0, $height, $width, $width_orig, $height_orig);
        imagejpeg($image_p, $image["tmp_name"], 100);



        $target_file = $this->target_dir . basename($image["name"]);


        $this->saveImg($image, $target_file);

        $logger->info("Zmienilem rozmiar:", ['Nazwa Pliku:' => $image["name"], 'Wymiary: ' => [$height, $width], 'Imagesize:' => filesize($target_file) . ' bajtów' ]);

    }

    public function validImg($image)
    {
        $target_file = $this->target_dir . basename($image["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if (file_exists($target_file)) {

            $msg = [
                'msg'   => "Sorry, file already exists.",
                'valid' => false
            ];
            return $msg;
        }
        if ($image["size"] > 500000) {

            $msg = [
                'msg'   => "Sorry, your file is too large.",
                'valid' => false
            ];
            return $msg;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

            $msg = [
                'msg'   => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
                'valid' => false
            ];
            return $msg;
        }

        $msg = [
          'msq'   => 'Validation ok',
          'valid' => true
        ];
        return $msg;

    }

    public function saveImg($image, $target_file)
    {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $msg =  "File ". basename($image["name"]). " has been uploaded.";
            return $msg;
        }
        return false;
    }


}