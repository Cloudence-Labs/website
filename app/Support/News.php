<?php

namespace App\Support;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * News posts from config('news'), newest first, with the slug, a parsed
 * date and the Markdown body rendered to HTML.
 */
class News
{
    public static function all(): Collection
    {
        return collect(config('news', []))
            ->map(fn (array $post, string $slug) => $post + [
                'slug' => $slug,
                'url'  => url('/news/' . $slug),
                'at'   => Carbon::parse($post['date']),
                'html' => Str::markdown($post['body'] ?? '', ['html_input' => 'strip', 'allow_unsafe_links' => false]),
                // Search snippets: optional short versions, else the title and a trimmed excerpt.
                'seo_title'       => $post['seo_title'] ?? $post['title'],
                'seo_description' => $post['seo_description'] ?? Str::limit($post['excerpt'], 155),
            ])
            ->sortByDesc('date');
    }
}
