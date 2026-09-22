<?php

namespace App\Support;

/**
 * Small helpers that emit JSON-LD structured data for the <head>.
 * Pages push these into the 'head' stack; the layout emits Organization
 * and WebSite on every page.
 */
class Seo
{
    public static function jsonLd(array $data): string
    {
        $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        // Guard against a stray </script> inside content.
        $json = str_replace('</', '<\/', $json);

        return '<script type="application/ld+json">' . $json . '</script>';
    }

    public static function organization(): array
    {
        $site = config('site');
        $sameAs = array_values(array_filter(array_map(
            fn ($s) => ($s['url'] ?? '#') !== '#' ? $s['url'] : null,
            $site['social'] ?? []
        )));

        return [
            '@context'    => 'https://schema.org',
            '@type'       => 'Organization',
            '@id'         => url('/') . '#organization',
            'name'        => $site['name'],
            'legalName'   => $site['legal'],
            'url'         => url('/'),
            'logo'        => asset('images/main/logo.png'),
            'image'       => asset('images/og-default.png'),
            'description' => 'ICT solutions for businesses and government institutions across Nigeria: enterprise software, web and mobile development, networks, CCTV, IT consulting, hardware and training.',
            'email'       => $site['mail'],
            'telephone'   => $site['phone1'],
            'areaServed'  => ['@type' => 'Country', 'name' => 'Nigeria'],
            'address'     => array_map(fn ($o) => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $o['address'],
                'addressLocality' => $o['city'],
                'addressCountry'  => 'NG',
            ], $site['offices']),
            'contactPoint' => [[
                '@type'             => 'ContactPoint',
                'contactType'       => 'sales',
                'telephone'         => $site['phone1'],
                'email'             => $site['mail'],
                'availableLanguage' => 'en',
                'areaServed'        => 'NG',
            ]],
            'sameAs' => $sameAs,
        ];
    }

    public static function website(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            '@id'      => url('/') . '#website',
            'url'      => url('/'),
            'name'     => config('site.name'),
            'publisher' => ['@id' => url('/') . '#organization'],
            'inLanguage' => 'en',
        ];
    }

    /** @param array<int, array{0:string,1:string}> $crumbs  [[label, url], ...] */
    public static function breadcrumbs(array $crumbs): string
    {
        $items = [];
        foreach ($crumbs as $i => [$name, $url]) {
            $items[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $name, 'item' => url($url)];
        }

        return static::jsonLd([
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $items,
        ]);
    }

    /** @param array<int, array{0:string,1:string}> $faqs  [[question, answer], ...] */
    public static function faq(array $faqs): string
    {
        return static::jsonLd([
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn ($f) => [
                '@type'          => 'Question',
                'name'           => $f[0],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
            ], $faqs),
        ]);
    }

    public static function service(array $service, string $url): string
    {
        return static::jsonLd([
            '@context'    => 'https://schema.org',
            '@type'       => 'Service',
            'name'        => $service['label'],
            'description' => $service['description'],
            'url'         => url($url),
            'serviceType' => $service['label'],
            'provider'    => ['@id' => url('/') . '#organization'],
            'areaServed'  => ['@type' => 'Country', 'name' => 'Nigeria'],
        ]);
    }

    /** @param array<int, array{0:string,1:string}> $items  [[name, url], ...] */
    public static function itemList(array $items): string
    {
        return static::jsonLd([
            '@context'        => 'https://schema.org',
            '@type'           => 'ItemList',
            'itemListElement' => array_map(fn ($it, $i) => [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $it[0],
                'url'      => url($it[1]),
            ], $items, array_keys($items)),
        ]);
    }

    public static function page(string $type, string $name, string $url, ?string $description = null): string
    {
        return static::jsonLd(array_filter([
            '@context'    => 'https://schema.org',
            '@type'       => $type,
            'name'        => $name,
            'url'         => url($url),
            'description' => $description,
            'isPartOf'    => ['@id' => url('/') . '#website'],
            'about'       => ['@id' => url('/') . '#organization'],
        ]));
    }
}
