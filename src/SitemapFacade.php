<?php

namespace Sitemap;

use Illuminate\Support\Facades\Facade;

class SitemapFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SitemapStaticFactory::class;
    }
}