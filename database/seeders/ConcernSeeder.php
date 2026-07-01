<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concern;

class ConcernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concerns = [
            [
                'title' => 'SIKDER APPAREL HOSIERY LTD.',
                'description' => 'Premium hosiery manufacturing with cutting-edge technology and superior quality control.',
                'icon_class' => 'fa-shirt',
                'order_index' => 1,
            ],
            [
                'title' => 'SIKDER CLASSIC DYEING & KNITTING (PVT) LTD',
                'description' => 'State-of-the-art dyeing and knitting facility ensuring color perfection and fabric durability.',
                'icon_class' => 'fa-droplet',
                'order_index' => 2,
            ],
            [
                'title' => 'SIKDER APPAREL LTD.',
                'description' => 'High-volume, export-quality apparel production meeting global fashion standards.',
                'icon_class' => 'fa-vest',
                'order_index' => 3,
            ],
            [
                'title' => 'SIKDER COMPUTERIZED LABEL LTD.',
                'description' => 'Precision computerized labeling and branding solutions for the textile industry.',
                'icon_class' => 'fa-tags',
                'order_index' => 4,
            ],
            [
                'title' => 'PUBAIL RESORT CLUB',
                'description' => 'An exclusive retreat offering world-class hospitality, recreation, and serenity.',
                'icon_class' => 'fa-umbrella-beach',
                'order_index' => 5,
            ]
        ];

        foreach ($concerns as $concern) {
            Concern::create($concern);
        }
    }
}
