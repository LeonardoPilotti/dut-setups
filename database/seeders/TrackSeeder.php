<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    public function run(): void
    {
        $tracks = [
            ['name' => 'Austrália', 'country' => 'au', 'slug' => 'australia'],
            ['name' => 'China', 'country' => 'cn', 'slug' => 'china'],
            ['name' => 'Japão', 'country' => 'jp', 'slug' => 'japao'],
            ['name' => 'Bahrein', 'country' => 'bh', 'slug' => 'bahrein'],
            ['name' => 'Arábia Saudita', 'country' => 'sa', 'slug' => 'arabia-saudita'],
            ['name' => 'Miami', 'country' => 'us', 'slug' => 'miami'],
            ['name' => 'Imola', 'country' => 'it', 'slug' => 'imola'],
            ['name' => 'Mônaco', 'country' => 'mc', 'slug' => 'monaco'],
            ['name' => 'Espanha', 'country' => 'es', 'slug' => 'espanha'],
            ['name' => 'Canadá', 'country' => 'ca', 'slug' => 'canada'],
            ['name' => 'Áustria', 'country' => 'at', 'slug' => 'austria'],
            ['name' => 'Grã-Bretanha', 'country' => 'gb', 'slug' => 'gra-bretanha'],
            ['name' => 'Bélgica', 'country' => 'be', 'slug' => 'belgica'],
            ['name' => 'Hungria', 'country' => 'hu', 'slug' => 'hungria'],
            ['name' => 'Holanda', 'country' => 'nl', 'slug' => 'holanda'],
            ['name' => 'Monza', 'country' => 'it', 'slug' => 'monza'],
            ['name' => 'Singapura', 'country' => 'sg', 'slug' => 'singapura'],
            ['name' => 'Austin', 'country' => 'us', 'slug' => 'austin'],
            ['name' => 'México', 'country' => 'mx', 'slug' => 'mexico'],
            ['name' => 'Brasil', 'country' => 'br', 'slug' => 'brasil'],
            ['name' => 'Las Vegas', 'country' => 'us', 'slug' => 'las-vegas'],
            ['name' => 'Catar', 'country' => 'qa', 'slug' => 'catar'],
            ['name' => 'Abu Dhabi', 'country' => 'ae', 'slug' => 'abu-dhabi'],
        ];

        foreach ($tracks as $track) {
            Track::updateOrCreate(
                ['slug' => $track['slug']],
                $track
            );
        }

    }
}
