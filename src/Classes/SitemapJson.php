<?php

namespace Sitemap\Classes;

use Sitemap\Interfaces\SitemapFactoryInterface;

class SitemapJson implements SitemapFactoryInterface
{
    private array $sitemap_data;

    public function __construct(array $sitemap_data)
    {
        $this->sitemap_data = $sitemap_data;
    }

    public function save(string $file_path)
    {
        file_put_contents(sprintf('%s/sitemap.json', $file_path), json_encode($this->sitemap_data));
    }
}