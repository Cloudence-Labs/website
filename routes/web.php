<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/services/{slug}', function (string $slug) {
    $service = collect(config('site.services'))->firstWhere('slug', $slug);
    $details = config('service-details.' . $slug);
    abort_unless($service && $details, 404);

    return view('pages.service', compact('service', 'details'));
})->name('service');

Route::get('/industries', function () {
    return view('pages.industries');
})->name('industries');

Route::get('/industries/{slug}', function (string $slug) {
    $industry = config('industries.' . $slug);
    abort_unless($industry, 404);

    return view('pages.industry', ['slug' => $slug, 'industry' => $industry]);
})->name('industry');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => url('/'),           'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => url('/about'),      'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => url('/services'),   'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => url('/industries'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => url('/contact'),    'priority' => '0.7', 'changefreq' => 'yearly'],
    ];
    foreach (config('site.services') as $s) {
        $urls[] = ['loc' => url('/services/' . $s['slug']), 'priority' => '0.8', 'changefreq' => 'monthly'];
    }
    foreach (array_keys(config('industries')) as $slug) {
        $urls[] = ['loc' => url('/industries/' . $slug), 'priority' => '0.7', 'changefreq' => 'monthly'];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
         . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($urls as $u) {
        $xml .= "  <url><loc>" . e($u['loc']) . "</loc><changefreq>{$u['changefreq']}</changefreq><priority>{$u['priority']}</priority></url>\n";
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
})->name('sitemap');
