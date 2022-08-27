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

        return ucfirst(trim(config('sitemap.default')));
    }
}