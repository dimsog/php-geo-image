<?php

namespace Dimsog\Geoimage;

class Coordinates
{
    /**
     * Extract coordinates from an image
     * ```php
     * Coordinates::extract('/path/to/image.jpg');
     * ```
     * @param $image
     * @return array|null
     */
    public static function extract($image)
    {
        if (file_exists($image) == false || is_file($image) == false) {
            return null;
        }
        $mime = mime_content_type($image);
        if ($mime != 'image/jpeg') {
            return null;
        }
        $exif = exif_read_data($image);
        if (empty($exif) || empty($exif['GPSLatitude']) || empty($exif['GPSLongitude'])) {
            return null;
        }
        return [
            static::parseCoordinate($exif['GPSLatitude']),
            static::parseCoordinate($exif['GPSLongitude'])
        ];
    }

    private static function parseCoordinate(array $coordinate)
    {
        foreach ($coordinate as $key => $item) {
            $item = explode('/', $item);
            $coordinate[$key] = $item[0] / (isset($item[1]) ? $item[1] : 1);
        }
        return round($coordinate[0] + ($coordinate[1] / 60) + ($coordinate[2] / 3600), 7);
    }
}