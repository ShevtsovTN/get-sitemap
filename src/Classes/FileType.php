<?php

namespace Sitemap\Classes;

use Exception;

class FileType
{
    /**
     * @throws Exception
     */
    public static function getFileType(string $file_type): string
    {
        if (empty($file_type)) {
            throw new Exception('File type is empty!', 422);
        }
        $file_type = in_array($file_type, array_keys(config('sitemap.types')))
            ? $file_type
            : config('sitemap.default');

        return ucfirst(trim($file_type));
    }
}