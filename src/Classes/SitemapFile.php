<?php

namespace Sitemap\Classes;

use Sitemap\Interfaces\SitemapFactoryInterface;

class SitemapFile implements SitemapFactoryInterface
{
    protected array $sitemap_data;

    public function __construct(array $sitemap_data)
    {
        $this->sitemap_data = $sitemap_data;
    }

    public function save(string $file_path)
    {
        // TODO: Implement save() method.
    }
}