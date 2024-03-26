<?php

namespace Database\Seeders;

use App\Models\PageSection;
use App\Models\SectionSetting;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'page_id'=>1,
                'content_templates_id'=>2,
                'section_title'=>'Introduction Section',
                'sub_title'=>null,
                'section_slug'=>'home-introduction',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>1,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>3,
                'section_title'=>'BCIO News',
                'sub_title'=>null,
                'section_slug'=>'admin-news',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>2,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>4,
                'section_title'=>'Bridge Club',
                'sub_title'=>null,
                'section_slug'=>'home-club-section',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>3,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>3,
                'section_title'=>'BRIDGE CLUB Activity Reports',
                'sub_title'=>'BRIDGE CLUB Activity',
                'section_slug'=>'bcio-news',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>4,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>3,
                'section_title'=>'BCPN News',
                'sub_title'=>null,
                'section_slug'=>'bcpn-news',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>5,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>5,
                'section_title'=>'APCC/BCIO in Figures',
                'sub_title'=>'Counter Section',
                'section_slug'=>'counters',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>6,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>6,
                'section_title'=>'Member Section',
                'section_slug'=>'home-members',
                'sub_title'=>'',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>7,
                'icon'=>null,
            ],
            [
                'page_id'=>1,
                'content_templates_id'=>7,
                'section_title'=>'Logo Section',
                'sub_title'=>'',
                'section_slug'=>'logos',
                'section_description'=>null,
                'image'=>null,
                'user_id'=>1,
                'sort'=>8,
                'icon'=>null,
            ],
        ];

        PageSection::insert($sections);
    }
}
