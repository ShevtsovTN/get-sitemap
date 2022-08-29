<?php

namespace Sitemap\Classes;

use Sitemap\Interfaces\SitemapFactoryInterface;

class SitemapJson extends SitemapFile implements SitemapFactoryInterface
{
    public function save(string $file_path)
    {
        file_put_contents(sprintf('%s/sitemap.json', $file_path), json_encode(array_values($this->sitemap_data)));
    }
}