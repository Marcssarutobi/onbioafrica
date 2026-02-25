<?php

namespace Database\Seeders;

use App\Models\TypeSpeaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Keynote Speaker',
            'Plenary Speaker',
            'Invited Speaker',
            'Oral Presenter',
            'Poster Presenter',
            'Panelist',
            'Moderator',
        ];

        foreach ($types as $type) {
            TypeSpeaker::firstOrCreate([
                'name' => $type
            ]);
        }
    }
}
