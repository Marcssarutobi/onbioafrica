<?php

namespace Database\Seeders;

use App\Models\Comiter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'fullname' => 'Dr. John Anderson',
                'post'     => 'Chairman of Scientific Committee',
                'image'    => 'committee/john-anderson.jpg',
            ],
            [
                'fullname' => 'Prof. Marie Dupont',
                'post'     => 'Vice Chair',
                'image'    => 'committee/marie-dupont.jpg',
            ],
            [
                'fullname' => 'Dr. Ahmed Ben Ali',
                'post'     => 'Committee Member',
                'image'    => 'committee/ahmed-benali.jpg',
            ],
            [
                'fullname' => 'Dr. Sarah Johnson',
                'post'     => 'Committee Member',
                'image'    => 'committee/sarah-johnson.jpg',
            ],
            [
                'fullname' => 'Prof. Lucas Martin',
                'post'     => 'Committee Member',
                'image'    => 'committee/lucas-martin.jpg',
            ],
        ];

        foreach ($members as $member) {
            Comiter::create($member);
        }
    }
}
