<?

class Webp{

    /**
     * Start run script
     * Allowed format JPG, PNG
     * @param string $path url img
     * @return string
     */
    public static function convert($path = "")
    {
        if(self::getBrowser() != "Safari" AND self::getBrowser() != "Trident")
        {
            return self::create($path);
        }
        return $path;
    }

    /**
     * Create webp
     * @param $path
     * @return bool|mixed
     */
    public function create($path) {
        $newImgPath = false;

        if (function_exists('imagewebp')) {

            $path = strtolower($path);
            if (strpos($path, '.png')) {
                $newImgPath = str_replace('.png', '.webp', $path);
                if(file_exists($newImgPath))
                {
                    return $newImgPath;
                }
                $newImg = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'] . $path);

            } elseif (strpos($path, '.jpg') !== false || strpos($path, '.jpeg') !== false)
            {

                $newImgPath = str_replace(array('.jpg', '.jpeg'), '.webp', $path);
                if(file_exists($newImgPath))
                {
                    return $newImgPath;
                }
                $newImg = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'] . $path);
            }
            if ($newImg) {
                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $newImgPath)) {
                    imagewebp($newImg, $_SERVER['DOCUMENT_ROOT'] . $newImgPath, 90);
                }
                imagedestroy($newImg);
            }

        }

        return $newImgPath;
    }

    /**
     * Check browser for internet explorer
     * @return mixed
     */
    public function getBrowser()
    {
        preg_match("/(Trident|MSIE|Opera|Firefox|Chrome|Safari)(?:\/| )([0-9.]+)/", $_SERVER['HTTP_USER_AGENT'], $browser_info);
        return $browser_info[1];
    }
}
?>