<?php

defined('_JEXEC') or die;

class modSlideshowHelper
{
    public static function getImages($params)
    {
        /**
         *  Получение параметров
         */

        $slideshow_type     =   $params->get("slideshow_type");
        $slideshow_link     =   $params->get("slideshow_link");
        $slideshow_image    =   $params->get("slideshow_image");
        $slideshow_mask     =   date("Ymd",time())."-";

        /**
         *  Если выбран FTP
         */

        if($slideshow_type  ==  0)
        {
            $catalog    =   JPATH_ROOT.'/'.$slideshow_link;

            if(is_dir($catalog))
            {
                foreach (array_diff(scandir($catalog),array('.', '..')) as $file )
                    if($_file = stristr($file, $slideshow_mask))
                        $images[]   =   array('path'=>$slideshow_link,'filename'=>$_file);
            }
        }

        /**
         *  Если выбран Удаленный доступ
         */

        if($slideshow_type  ==  1)
        {
            $num            =   1;

            while(true)
            {
                $filename    =   $slideshow_mask.$num.".".$slideshow_image;
                $info        =   self::setCurlUrl($slideshow_link.'/'.$filename);

                if(self::getMimeType($info['content_type']))
                    $images[]   =   array('path'=>$slideshow_link,'filename'=>$filename);
                else
                    break;

                $num++;
            }
        }

        return $images;
    }

    public function setCurlUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return $info;
    }

    public function getMimeType($mime)
    {
        $mimes  =   array('image/png','image/jpg','image/jpeg','image/bmp','image/gif');

        if(in_array($mime,$mimes))
            return true;
    }
}