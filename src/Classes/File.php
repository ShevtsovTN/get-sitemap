<?php

namespace Sitemap\Classes;

use Exception;

class File
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

    /**
     * @param string $file_path
     * @return void
     * @throws Exception
     */
    public static function checkDirectory(string $file_path): void
    {
        if (!is_writable(dirname($file_path))) {
            throw new Exception('Access denied for writing in this directory!', 403);
        }
    }
}