<?php

namespace Sitemap;

use Exception;
use Sitemap\Classes\FileType;
use Sitemap\Classes\Sitemap;

class SitemapStaticFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $file_type, string $file_path, array $sitemap_data): void
    {
        Sitemap::checkSitemapData($sitemap_data);

        $objName = sprintf('Sitemap\Classes\Sitemap%s', FileType::getFileType($file_type));

        (new $objName($sitemap_data))->save($file_path);
    }
}