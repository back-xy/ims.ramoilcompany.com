<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();

        $places = [
            ['place_name' => 'چێشتخانەی سەروو', 'owner_name' => 'سەروان محمد', 'profession' => 'چێشتخانە', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => true, 'activity_percentage' => 85.5],
            ['place_name' => 'سوپەرمارکێتی ئاوات', 'owner_name' => 'ئاوات کەریم', 'profession' => 'فرۆشگای گشتی', 'social_apps' => ['whatsapp'], 'is_customer' => true, 'activity_percentage' => 92.0],
            ['place_name' => 'دەرمانخانەی ژیان', 'owner_name' => 'ژیان احمد', 'profession' => 'دەرمانخانە', 'social_apps' => ['whatsapp', 'viber'], 'is_customer' => false, 'activity_percentage' => 78.3],
            ['place_name' => 'قسەخانەی کاوە', 'owner_name' => 'کاوە رەشید', 'profession' => 'قەهوەخانە', 'social_apps' => ['telegram'], 'is_customer' => true, 'activity_percentage' => 65.0],
            ['place_name' => 'مۆبایلی تەکنۆ', 'owner_name' => 'بەختیار عمر', 'profession' => 'فرۆشگای مۆبایل', 'social_apps' => ['whatsapp', 'telegram', 'viber'], 'is_customer' => true, 'activity_percentage' => 88.7],
            ['place_name' => 'سالۆنی شانازی', 'owner_name' => 'شانا حسن', 'profession' => 'سالۆنی ژنانە', 'social_apps' => ['whatsapp'], 'is_customer' => false, 'activity_percentage' => 70.5],
            ['place_name' => 'کلینیکی دندان دکتۆر سەرهەنگ', 'owner_name' => 'سەرهەنگ فەرهاد', 'profession' => 'دکتۆری دندان', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => false, 'activity_percentage' => 82.0],
            ['place_name' => 'جلوبەرگی میران', 'owner_name' => 'میران قادر', 'profession' => 'فرۆشگای جل', 'social_apps' => ['telegram'], 'is_customer' => true, 'activity_percentage' => 75.8],
            ['place_name' => 'کومپیوتەری ئاسۆ', 'owner_name' => 'ئاسۆ رەحیم', 'profession' => 'چاککردنەوەی کۆمپیوتەر', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => true, 'activity_percentage' => 91.2],
            ['place_name' => 'پیتزا هاوسە', 'owner_name' => 'دارا عزیز', 'profession' => 'پیتزا و فاست فود', 'social_apps' => ['whatsapp'], 'is_customer' => true, 'activity_percentage' => 95.0],
            ['place_name' => 'هاوپشکی گۆران', 'owner_name' => 'گۆران مستەفا', 'profession' => 'چاککردنەوەی پێلاو', 'social_apps' => [], 'is_customer' => false, 'activity_percentage' => 45.0],
            ['place_name' => 'کتێبخانەی زانست', 'owner_name' => 'روژگار حەمە', 'profession' => 'فرۆشگای کتێب', 'social_apps' => ['telegram', 'viber'], 'is_customer' => false, 'activity_percentage' => 60.5],
            ['place_name' => 'باخچەی منداڵان دڵنیا', 'owner_name' => 'دڵنیا ئیبراهیم', 'profession' => 'باخچەی منداڵان', 'social_apps' => ['whatsapp'], 'is_customer' => true, 'activity_percentage' => 87.0],
            ['place_name' => 'جینز و پۆشاک سامان', 'owner_name' => 'سامان ئەحمەد', 'profession' => 'جلی پیاوان', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => false, 'activity_percentage' => 72.3],
            ['place_name' => 'کارگەی ئەلومینیۆم هیوا', 'owner_name' => 'هیوا سعید', 'profession' => 'کارگەی ئەلومینیۆم', 'social_apps' => ['whatsapp'], 'is_customer' => true, 'activity_percentage' => 68.0],
            ['place_name' => 'فرۆشگای کەرەستەی ئاوەدانی', 'owner_name' => 'عارام جەلال', 'profession' => 'کەرەستەی بیناسازی', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => true, 'activity_percentage' => 89.5],
            ['place_name' => 'گوڵفرۆش ڕۆژهەڵات', 'owner_name' => 'رۆژهەڵات رەسووڵ', 'profession' => 'فرۆشگای گوڵ', 'social_apps' => ['whatsapp'], 'is_customer' => false, 'activity_percentage' => 55.0],
            ['place_name' => 'نانەواخانەی نان و چێژ', 'owner_name' => 'بەشار عومەر', 'profession' => 'نانەواخانە', 'social_apps' => [], 'is_customer' => true, 'activity_percentage' => 93.8],
            ['place_name' => 'گاراجی سەیارە کێبەڕ', 'owner_name' => 'کێبەڕ محەمەد', 'profession' => 'چاککردنەوەی ئۆتۆمبێل', 'social_apps' => ['whatsapp', 'viber'], 'is_customer' => true, 'activity_percentage' => 76.0],
            ['place_name' => 'خوێندنگەی ئینگلیزی براین', 'owner_name' => 'ئەنوەر سەلیم', 'profession' => 'قوتابخانەی زمان', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => false, 'activity_percentage' => 84.5],
            ['place_name' => 'فێرگەی شۆفێری ڕێگای سەلامەت', 'owner_name' => 'شێرکۆ ئەسعەد', 'profession' => 'فێرگەی شۆفێری', 'social_apps' => ['whatsapp'], 'is_customer' => true, 'activity_percentage' => 79.0],
            ['place_name' => 'خانووی چاپ و ڕەنگ', 'owner_name' => 'بەرزان خالید', 'profession' => 'چاپخانە', 'social_apps' => ['telegram', 'viber'], 'is_customer' => false, 'activity_percentage' => 66.7],
            ['place_name' => 'وێستگەی بەنزین لوتکە', 'owner_name' => 'بۆتان سالح', 'profession' => 'وێستگەی سووتەمەنی', 'social_apps' => ['whatsapp'], 'is_customer' => true, 'activity_percentage' => 97.5],
            ['place_name' => 'مۆبلیات و دیکۆری سەردار', 'owner_name' => 'سەردار غەفور', 'profession' => 'فرۆشگای مۆبلیات', 'social_apps' => ['whatsapp', 'telegram'], 'is_customer' => true, 'activity_percentage' => 81.2],
            ['place_name' => 'کافی شۆپی ئارا', 'owner_name' => 'ئارا جەواد', 'profession' => 'کافی شۆپ', 'social_apps' => ['whatsapp', 'telegram', 'viber'], 'is_customer' => true, 'activity_percentage' => 90.0],
        ];

        $phonePrefixes = ['0750', '0751', '0770', '0771', '0780', '0781'];

        foreach ($places as $placeData) {
            Place::create([
                'place_name' => $placeData['place_name'],
                'owner_name' => $placeData['owner_name'],
                'profession' => $placeData['profession'],
                'primary_phone' => '+964 ' . $phonePrefixes[array_rand($phonePrefixes)] . ' ' . rand(100, 999) . ' ' . rand(1000, 9999),
                'secondary_phone' => rand(0, 1) ? '+964 ' . $phonePrefixes[array_rand($phonePrefixes)] . ' ' . rand(100, 999) . ' ' . rand(1000, 9999) : null,
                'social_apps' => $placeData['social_apps'],
                'is_customer' => $placeData['is_customer'],
                'activity_percentage' => $placeData['activity_percentage'],
                'city_id' => $cities->random()->id,
                'address' => 'شەقامی ' . ['سەرەکی', 'لاوەکی', 'فەرعی', '60 مەتری'][array_rand([0, 1, 2, 3])],
                'gps' => rand(35, 37) . '.' . rand(1000, 9999) . ', ' . rand(43, 45) . '.' . rand(1000, 9999),
            ]);
        }
    }
}
