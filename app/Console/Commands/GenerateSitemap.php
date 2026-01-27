<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml';

    public function handle()
    {
        $sitemap = Sitemap::create()

            // Homepage
            ->add(
                Url::create('/')
                    ->setPriority(1.0)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            )

            // Static pages
            ->add(
                Url::create('/portfolio')
                    ->setPriority(0.8)
            )
            ->add(
                Url::create('/contact')
                    ->setPriority(0.7)
            );

        /**
         * Jika nanti ada blog:
         *
         * foreach (\App\Models\Post::where('status','publish')->get() as $post) {
         *   $sitemap->add(
         *      Url::create("/blog/{$post->slug}")
         *          ->setPriority(0.7)
         *   );
         * }
         */

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
