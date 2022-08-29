<?php

namespace Sitemap\Classes;

use Illuminate\Support\Collection;
use Sitemap\Interfaces\SitemapFactoryInterface;

class SitemapFile implements SitemapFactoryInterface
{
    protected array $sitemap_data;

    public function __construct(array|Collection $sitemap_data)
    {
        $this->sitemap_data = $sitemap_data;
    }

    public function save(string $file_path)
    {
        // TODO: Implement save() method.
    }
}