<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadSliderImages extends Command
{
    protected $signature = 'slider:download';
    protected $description = 'Download slider images';

    public function handle()
    {
        $images = [
            'slide1.jpg' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba',
            'slide2.jpg' => 'https://images.unsplash.com/photo-1440404653325-ab127d49abc1',
            'slide3.jpg' => 'https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c',
            'slide4.jpg' => 'https://images.unsplash.com/photo-1542204165-65bf26472b9b',
            'slide5.jpg' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728'
        ];

        Storage::makeDirectory('public/images/slider');

        foreach ($images as $filename => $url) {
            $this->info("Downloading {$filename}...");

            $response = Http::get($url);

            if ($response->successful()) {
                Storage::put("public/images/slider/{$filename}", $response->body());
                $this->info("Successfully downloaded {$filename}");
            } else {
                $this->error("Failed to download {$filename}");
            }
        }

        $this->info('All images downloaded successfully!');
    }
}
