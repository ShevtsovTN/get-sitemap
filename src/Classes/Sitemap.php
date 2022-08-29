<?php

namespace Sitemap\Classes;

use Exception;
use Illuminate\Support\Collection;

class Sitemap
{
    /**
     * @throws Exception
     */
    public static function checkSitemapData(array|Collection $sitemap_data): void
    {
        if (empty($sitemap_data)) {
            throw new Exception('Sitemap data is empty!', 422);
        }
        foreach ($sitemap_data as $sitemap_datum) {
            if (['loc', 'lastmod', 'priority', 'changefreq'] != array_keys($sitemap_datum)) {
                throw new Exception('Wrong sitemap data!', 422);
            }
        }
    }
}