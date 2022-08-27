<?php

namespace Sitemap\Classes;

use Sitemap\Interfaces\SitemapFactoryInterface;

class SitemapCsv implements SitemapFactoryInterface
{
    private array $sitemap_data;

    public function __construct(array $sitemap_data)
    {
        $this->sitemap_data = $sitemap_data;
    }

    public function save(string $file_path)
    {
        $fp = fopen(sprintf('%s/sitemap.csv', $file_path), 'w+');

        foreach ($this->sitemap_data as $index => $sitemap_datum) {
            if ($index == 0) {
                fputcsv($fp, array_keys($sitemap_datum), separator: config('sitemap.csv.separator'));
            }
            fputcsv($fp, array_values($sitemap_datum), separator: config('sitemap.csv.separator'));
        }

        fclose($fp);
    }
}