<?php

namespace Sitemap;

use Exception;
use Illuminate\Support\Collection;
use Sitemap\Classes\File;
use Sitemap\Classes\Sitemap;

class SitemapStaticFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $file_type, string $file_path, array|Collection $sitemap_data): void
    {
        File::checkDirectory($file_path);

        Sitemap::checkSitemapData($sitemap_data);

        $objName = sprintf('Sitemap\Classes\Sitemap%s', File::getFileType($file_type));

        (new $objName($sitemap_data))->save($file_path);
    }
}