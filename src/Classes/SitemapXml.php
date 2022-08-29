<?php

namespace Sitemap\Classes;

use Sitemap\Interfaces\SitemapFactoryInterface;
use XMLWriter;

class SitemapXml extends SitemapFile implements SitemapFactoryInterface
{
    public function save(string $file_path)
    {
        $xw = new XMLWriter();
        $xw->openMemory();
        $xw->startDocument();
        $xw->setIndent(true);
        $xw->startElement('urlset');
        $xw = self::getSchemaAttributes($xw);
        foreach ($this->sitemap_data as $sitemap_datum) {
            $xw->startElement('url');
            foreach ($sitemap_datum as $key => $value) {
                $xw->startElement($key);
                $xw->text($value);
                $xw->endElement();
            }
            $xw->endElement();
        }
        $xw->endElement();
        $xw->endDocument();

        file_put_contents(sprintf('%s/sitemap.xml', $file_path), $xw->outputMemory());
    }

    private static function getSchemaAttributes($xw)
    {
        $xw->startAttribute('xmlns:xsi');
        $xw->text('http://www.w3.org/2001/XMLSchema-instance');
        $xw->endAttribute();

        $xw->startAttribute('xmlns');
        $xw->text('http://www.sitemaps.org/schemas/sitemap/0.9');
        $xw->endAttribute();

        $xw->startAttribute('xsi:schemaLocation');
        $xw->text('http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
        $xw->endAttribute();

        return $xw;
    }
}