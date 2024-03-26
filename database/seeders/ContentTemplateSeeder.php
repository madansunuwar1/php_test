<?php

namespace Database\Seeders;

use App\Models\ContentTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentTemplate::insert([
            ['template_title'=>'Simple Content','template_name'=>'simple-content'],
            ['template_title'=>'Two Column','template_name'=>'two-column'],
            ['template_title'=>'Post Object','template_name'=>'post-object'],
            ['template_title'=>'Bridge Club','template_name'=>'bridge-club'],
            ['template_title'=>'Counter','template_name'=>'counter'],
            ['template_title'=>'BCPN Members Blog & BCPN Members','template_name'=>'bcpn-member-blog'],
            ['template_title'=>'Logo','template_name'=>'logo'],
            ['template_title'=>'Blog Single','template_name'=>'blog-single-1'],
            ['template_title'=>'Blog Single 2','template_name'=>'blog-single-2'],
            ['template_title'=>'Blog Single 3','template_name'=>'blog-single-3'],
            ['template_title'=>'About Club','template_name'=>'about-club'],
        ]);
    }
}
