<?php

namespace Sitemap;

use Exception;
use Sitemap\Classes\FileType;
use Sitemap\Classes\Sitemap;
use Sitemap\Interfaces\SitemapFactoryInterface;

class SitemapStaticFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $file_type, string $file_path, array $sitemap_data): SitemapFactoryInterface
    {
        Sitemap::checkSitemapData($sitemap_data);

        $objName = sprintf('Sitemap%s', FileType::getFileType($file_type));

        return (new $objName($sitemap_data))->save($file_path);
    }
}