<?php

namespace Database\Seeders;

use App\Models\Rank;
use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Database\Seeder;

class ServiceDetailSeeder extends Seeder
{
    public function run()
    {
        $rankServiceDetails = [
            [
                'rank' => 'Стажер',
                'services' => [
                    [
                        'title' => 'Чоловіча стрижка',
                        'duration' => 60,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Стрижка бороди',
                        'duration' => 45,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Королівське гоління',
                        'duration' => 60,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Камуфлювання сивини',
                        'duration' => 45,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Воскова депіляція',
                        'duration' => 15,
                        'price' => 100,
                    ],
                    [
                        'title' => 'Чорна маска',
                        'duration' => 45,
                        'price' => 150,
                    ],
                ],
            ],

            [
                'rank' => 'Барбер',
                'services' => [
                    [
                        'title' => 'Чоловіча стрижка',
                        'duration' => 60,
                        'price' => 300,
                    ],
                    [
                        'title' => 'Стрижка машинкою з переходом',
                        'duration' => 45,
                        'price' => 250,
                    ],
                    [
                        'title' => 'Дитяча стрижка (6-12 років)',
                        'duration' => 60,
                        'price' => 250,
                    ],
                    [
                        'title' => 'Стрижка під одну насадку / Корекція стрижки',
                        'duration' => 45,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Батько та син',
                        'duration' => 120,
                        'price' => 500,
                    ],
                    [
                        'title' => 'Чоловіча стрижка + стрижка бороди',
                        'duration' => 90,
                        'price' => 500,
                    ],
                    [
                        'title' => 'Стрижка бороди',
                        'duration' => 45,
                        'price' => 250,
                    ],
                    [
                        'title' => 'Контур бороди тримером',
                        'duration' => 15,
                        'price' => 100,
                    ],
                    [
                        'title' => 'Королівське гоління',
                        'duration' => 60,
                        'price' => 250,
                    ],
                    [
                        'title' => 'Укладка',
                        'duration' => 15,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Камуфлювання сивини',
                        'duration' => 30,
                        'price' => 300,
                    ],
                    [
                        'title' => 'Воскова депіляція',
                        'duration' => 15,
                        'price' => 100,
                    ],
                    [
                        'title' => 'Чорна маска',
                        'duration' => 30,
                        'price' => 200,
                    ],
                ],
            ],

            [
                'rank' => 'Старший барбер',
                'services' => [
                    [
                        'title' => 'Чоловіча стрижка',
                        'duration' => 60,
                        'price' => 400,
                    ],
                    [
                        'title' => 'Стрижка машинкою з переходом',
                        'duration' => 45,
                        'price' => 350,
                    ],
                    [
                        'title' => 'Дитяча стрижка (6-12 років)',
                        'duration' => 60,
                        'price' => 350,
                    ],
                    [
                        'title' => 'Стрижка під одну насадку / Корекція стрижки',
                        'duration' => 30,
                        'price' => 200,
                    ],
                    [
                        'title' => 'Батько та син',
                        'duration' => 120,
                        'price' => 700,
                    ],
                    [
                        'title' => 'Чоловіча стрижка + стрижка бороди',
                        'duration' => 90,
                        'price' => 600,
                    ],
                    [
                        'title' => 'Стрижка бороди',
                        'duration' => 45,
                        'price' => 300,
                    ],
                    [
                        'title' => 'Контур бороди тримером',
                        'duration' => 15,
                        'price' => 150,
                    ],
                    [
                        'title' => 'Королівське гоління',
                        'duration' => 60,
                        'price' => 300,
                    ],
                    [
                        'title' => 'Укладка',
                        'duration' => 15,
                        'price' => 200,
                    ],
                    [
                        'title' => 'Камуфлювання сивини',
                        'duration' => 30,
                        'price' => 350,
                    ],
                    [
                        'title' => 'Воскова депіляція',
                        'duration' => 15,
                        'price' => 100,
                    ],
                    [
                        'title' => 'Чорна маска',
                        'duration' => 30,
                        'price' => 200,
                    ],
                ],
            ],

            [
                'rank' => 'ТОП-барбер',
                'services' => [
                    [
                        'title' => 'Чоловіча стрижка',
                        'duration' => 45,
                        'price' => 450,
                    ],
                    [
                        'title' => 'Стрижка машинкою з переходом',
                        'duration' => 45,
                        'price' => 400,
                    ],
                    [
                        'title' => 'Дитяча стрижка (6-12 років)',
                        'duration' => 60,
                        'price' => 400,
                    ],
                    [
                        'title' => 'Стрижка під одну насадку / Корекція стрижки',
                        'duration' => 30,
                        'price' => 250,
                    ],
                    [
                        'title' => 'Батько та син',
                        'duration' => 105,
                        'price' => 800,
                    ],
                    [
                        'title' => 'Чоловіча стрижка + стрижка бороди',
                        'duration' => 75,
                        'price' => 700,
                    ],
                    [
                        'title' => 'Стрижка бороди',
                        'duration' => 45,
                        'price' => 350,
                    ],
                    [
                        'title' => 'Контур бороди тримером',
                        'duration' => 15,
                        'price' => 200,
                    ],
                    [
                        'title' => 'Королівське гоління',
                        'duration' => 45,
                        'price' => 350,
                    ],
                    [
                        'title' => 'Укладка',
                        'duration' => 15,
                        'price' => 200,
                    ],
                    [
                        'title' => 'Камуфлювання сивини',
                        'duration' => 30,
                        'price' => 350,
                    ],
                    [
                        'title' => 'Воскова депіляція',
                        'duration' => 15,
                        'price' => 100,
                    ],
                    [
                        'title' => 'Чорна маска',
                        'duration' => 30,
                        'price' => 200,
                    ],
                ],
            ],
        ];

        foreach ($rankServiceDetails as $rankServiceDetail) {
            $rank = Rank::where('title', $rankServiceDetail['rank'])->first();

            if ($rank) {
                foreach ($rankServiceDetail['services'] as $serviceDetailData) {
                    $service = Service::where('title', $serviceDetailData['title'])->first();

                    if ($service) {
                        ServiceDetail::firstOrCreate([
                            'rank_id' => $rank->id,
                            'service_id' => $service->id,
                            'duration' => $serviceDetailData['duration'],
                            'price' => $serviceDetailData['price'],
                        ]);
                    }
                }
            }
        }
    }
}
