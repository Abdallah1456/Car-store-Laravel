<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'BMW M340i ',
                "price"=>"6230700",
                "description"=>"1x",
                "category"=>"suv",
                "gallery"=>"https://assets.carpages.ca/prod-blog/uploads/2023/05/PXL_20230417_190320908-1.jpg"
            ],
            [
                'name'=>'Audi Q5',
                "price"=>"5000000",
                "description"=>"1x",
                "category"=>"suv",
                "gallery"=>"https://cdni.autocarindia.com/ExtraImages/20230918125740_audi_q5_limited_edition.jpg"
            ],
            [
                'name'=>'chevrolet',
                "price"=>"4000000",
                "description"=>"1x",
                "category"=>"suv",
                "gallery"=>"https://content.almalnews.com/wp-content/uploads/2019/07/%D8%A3%D8%B3%D8%B9%D8%A7%D8%B1-%D8%B3%D9%8A%D8%A7%D8%B1%D8%A7%D8%AA-%D8%B4%D9%8A%D9%81%D8%B1%D9%88%D9%84%D9%8A%D9%87-1-1024x576.jpg"
            ],
            [
                'name'=>'2023 Chevrolet Model Lineup',
                "price"=>"5000000",
                "description"=>"1x",
                "category"=>"suv",
                "gallery"=>"https://cdn-ds.com/media/3410/zmot/2023_Chevrolet_Blazer_Premier_-_Black.png"
            ],
            [
                'name'=>'BYD ',
                "price"=>"2800000",
                "description"=>"1x",
                "category"=>"sport",
                "gallery"=>"https://www.topgear.com/sites/default/files/cars-car/image/2023/12/1%20BYD%20Seal%20review.JPG?w=1280&h=720"
            ],
            [
                'name'=>'Kia Rio',
                "price"=>"3600000",
                "description"=>"1x",
                "category"=>"hach Bag",
                "gallery"=>"https://ymimg1.b8cdn.com/resized/car_model/5365/logo/listing_main_2018_Kia_Rio_Hatchback.jpg"
            ],
            [
                'name'=>'Jeeb',
                "price"=>"5800000",
                "description"=>"1x",
                "category"=>"Hach Bag",
                "gallery"=>"https://carsguide-res.cloudinary.com/image/upload/f_auto,fl_lossy,q_auto,t_cg_hero_large/v1/editorial/202-jee-grand-cherokee-trackhawk-1001x565-%281%29.JPG"
            ],
            [
                'name'=>'BMW',
                "price"=>"3800000",
                "description"=>"1x",
                "category"=>"suv",
                "gallery"=>"https://imgd.aeplcdn.com/1200x900/n/cw/ec/152805/bmw-x5-facelift-right-front-three-quarter4.jpeg?isig=0&wm=0"
            ]
        ]);
    }
}




