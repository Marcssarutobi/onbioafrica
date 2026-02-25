<?php

namespace Database\Seeders;

use App\Models\Speaker;
use App\Models\TypeSpeaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        

        $speakers = [
            [
                'firstname'   => 'Jean',
                'lastname'    => 'Kouassi',
                'email'       => 'jean.kouassi@onebioafrica.org',
                'country'     => 'Côte d’Ivoire',
                'affiliation' => 'Associate Professor of Molecular Biology',
                'type'        => 'Keynote Speaker',
                'photo'       => 'speakers/jean-kouassi.jpg',

                'bio' => '
                    <p>
                        Jean Kouassi is an Associate Professor of Molecular Biology with over 15 years of experience in infectious disease research across West Africa. His work focuses on molecular diagnostics and pathogen surveillance in low-resource settings.
                    </p>
                    <p>
                        He has led several regional research initiatives aimed at strengthening laboratory capacity and promoting genomic data sharing among African institutions. His research has been published in multiple international peer-reviewed journals.
                    </p>
                    <p>
                        At OneBioAfrica, he advocates for interdisciplinary collaboration under the One Health framework, linking human health, animal health, and environmental sustainability through molecular science.
                    </p>
                ',
            ],

            [
                'firstname'   => 'Amina',
                'lastname'    => 'Diallo',
                'email'       => 'amina.diallo@onebioafrica.org',
                'country'     => 'Senegal',
                'affiliation' => 'Senior Bioinformatics Research Scientist',
                'type'        => 'Invited Speaker',
                'photo'       => 'speakers/amina-diallo.jpg',

                'bio' => '
                    <p>
                        Amina Diallo is a senior bioinformatics scientist specializing in genomic data analysis and antimicrobial resistance surveillance. She has contributed to multiple continental genomics initiatives in Africa.
                    </p>
                    <p>
                        Her expertise includes large-scale genomic data processing, pathogen evolution, and the application of bioinformatics tools to public health decision-making.
                    </p>
                    <p>
                        She is also deeply committed to mentorship and capacity building, training early-career researchers in bioinformatics and computational biology across Africa.
                    </p>
                ',
            ],

            [
                'firstname'   => 'Samuel',
                'lastname'    => 'Mensah',
                'email'       => 'samuel.mensah@onebioafrica.org',
                'country'     => 'Ghana',
                'affiliation' => 'Director of Genomics & Public Health Programs',
                'type'        => 'Panel Speaker',
                'photo'       => 'speakers/samuel-mensah.jpg',

                'bio' => '
                    <p>
                        Samuel Mensah is the Director of Genomics and Public Health Programs at a leading research institute in Ghana. His work bridges molecular biology and public health policy.
                    </p>
                    <p>
                        He has advised national health agencies on integrating genomic surveillance into disease outbreak response strategies, particularly for emerging infectious diseases.
                    </p>
                    <p>
                        His vision aligns strongly with OneBioAfrica’s mission of translating molecular data into actionable public health and policy interventions.
                    </p>
                ',
            ],
        ];

        foreach ($speakers as $speaker) {

             // ✅ récupère OU crée le type
            $type = TypeSpeaker::firstOrCreate([
                'name' => $speaker['type']
            ]);

            Speaker::create([
                'firstname'        => $speaker['firstname'],
                'lastname'         => $speaker['lastname'],
                'email'            => $speaker['email'],
                'country'          => $speaker['country'],
                'affiliation'      => $speaker['affiliation'],
                'photo'            => $speaker['photo'],
                'bio'              => $speaker['bio'],

                // ✅ remplacement clé
                'type_speaker_id'  => $type->id,
            ]);
        }
    }
}
