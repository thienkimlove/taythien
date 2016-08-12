<?php

use App\Category;
use App\GameContent;
use App\Setting;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);

    }
}


class CategorySeeder extends Seeder
{

    protected function generatePostAndCategories()
    {
        DB::table('categories')->truncate();

        $newsCategory = Category::create([
            'name' => 'Tin tức',
            'desc' => 'Tin tức'
        ]);

        $eventCategory = Category::create([
            'name' => 'Sự kiện',
            'desc' => 'Sự kiện'
        ]);

        $img = md5(time()).'.jpg';

        Image::make(public_path('frontend/images/img-lamnhiemvutt.jpg'))->save(public_path('files/'. $img));

        $posts = [
            [
                'title' => 'Example Post In Tin tuc 1',
                'desc' => 'Example Post In Tin tuc 1',
                'content' => 'Example Post In Tin tuc 1',
                'category_id' => $newsCategory->id,
                'image' => $img,
                'status' => true
            ],
            [
                'title' => 'Example Post In Tin tuc 2',
                'desc' => 'Example Post In Tin tuc 2',
                'content' => 'Example Post In Tin tuc 2',
                'category_id' => $newsCategory->id,
                'image' => $img,
                'status' => true
            ],

            [
                'title' => 'Example Post In Tin tuc 3',
                'desc' => 'Example Post In Tin tuc 3',
                'content' => 'Example Post In Tin tuc 3',
                'category_id' => $newsCategory->id,
                'image' => $img,
                'status' => true
            ],

            [
                'title' => 'Example Post In Su kien 1',
                'desc' => 'Example Post In Su kien 1',
                'content' => 'Example Post In Su kien 1',
                'category_id' => $eventCategory->id,
                'image' => $img,
                'status' => true
            ],
            [
                'title' => 'Example Post In Su kien 2',
                'desc' => 'Example Post In Su kien 2',
                'content' => 'Example Post In Su kien 2',
                'category_id' => $eventCategory->id,
                'image' => $img,
                'status' => true
            ],

            [
                'title' => 'Example Post InSu kien 3',
                'desc' => 'Example Post In Su kien 3',
                'content' => 'Example Post In Su kien 3',
                'category_id' => $eventCategory->id,
                'image' => $img,
                'status' => true
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }

    protected function generateSettings()
    {
        DB::table('settings')->truncate();

        Setting::create([
            'key_name' => 'Link Play trên Garena Plus',
            'key_value' => 'link_play_garena_plus',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link Play trên AppStore',
            'key_value' => 'link_play_appstore',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link Play trên GooglePlay',
            'key_value' => 'link_play_googleplay',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link tải APK',
            'key_value' => 'link_play_apk',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link Wiki',
            'key_value' => 'link_wiki',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link Facebook',
            'key_value' => 'link_facebook',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link Nạp Thẻ',
            'key_value' => 'link_napthe',
            'value' => '#',
        ]);

        Setting::create([
            'key_name' => 'Link Tải Game',
            'key_value' => 'link_taigame',
            'value' => '#',
        ]);
    }

    protected function generateGameContents()
    {
        DB::table('game_contents')->truncate();

        $img1 = md5(time()).'1.jpg';

        Image::make(public_path('frontend/images/img-video.jpg'))->save(public_path('files/'. $img1));

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_TRAILER'),
            'title' => 'TRAILER',
            'desc' => 'Mô tả index trailer',
            'image' => $img1,
            'video_url' => 'http://www.youtube.com/watch?v=k6mFF3VmVAs'
        ]);

        $img2 = md5(time()).'2.jpg';

        Image::make(public_path('frontend/images/img-a3.jpg'))->save(public_path('files/'. $img2));


        for ($i = 1 ; $i < 8 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
                'title' => 'artwork slide '.$i,
                'image' => $img2,
                'order' => $i
            ]);
        }


        $img3 = md5(time()).'3.jpg';

        Image::make(public_path('frontend/images/char3.png'))->save(public_path('files/'. $img3));

        for ($i = 1 ; $i < 6 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_CHARACTER_SLIDER'),
                'title' => 'Bích Thu '.$i,
                'desc' => 'Thuộc hệ Nhân, có thể gia nhập sư môn để tăng công vật lý đơn, trị liệu tập thể hoặc các kỹ năng phong ấn.',
                'image' => $img3,
                'order' => $i
            ]);
        }


        $img4 = md5(time()).'4.jpg';

        Image::make(public_path('frontend/images/img-nv1.jpg'))->save(public_path('files/'. $img4));

        for ($i = 1 ; $i < 6 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_MISSION_LIST'),
                'title' => 'Sư Môn '.$i,
                'desc' => 'Nhiệm vụ cơ bản, lợi ích cao cho cả tân thủ và người chơi kỳ cực. Dành chút thời gian đóng góp công sức cho sư môn phát triển để kiếm nhiều Bạc.',
                'image' => $img4,
                'order' => $i
            ]);
        }




        $img5 = md5(time()).'5.jpg';

        Image::make(public_path('frontend/images/img-lt1.png'))->save(public_path('files/'. $img5));


        for ($i = 1 ; $i < 10 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_PET_SLIDER'),
                'title' => 'Miêu Nữ '.$i,
                'desc' => 'Bé mèo đáng yêu nhưng có cú đấm không hề yếu thời gian đầu game.',
                'addition_desc' => 'Cách nhận linh thú',
                'image' => $img5,
                'order' => $i
            ]);
        }

        $img6 = md5(time()).'6.jpg';

        Image::make(public_path('frontend/images/img-sm1.png'))->save(public_path('files/'. $img6));

        for ($i = 1 ; $i < 10 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_SKILL_LIST'),
                'title' => 'Thiên Sách '.$i,
                'desc' => 'Công kích vật lý đơn lẻ, sức dài vai rộng, đấm phát chết luôn. Nôm na là thanh niên chuyên băng lên trước, tay nhanh hơn não, dồn sát thương mạnh.',
                'image' => $img6,
                'order' => $i
            ]);
        }


        $img7 = md5(time()).'7.jpg';

        Image::make(public_path('frontend/images/img-bt2.jpg'))->save(public_path('files/'. $img7));

        for ($i = 1 ; $i < 13 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_TOGETHER_SLIDER'),
                'title' => 'Bích Thu '.$i,
                'desc' => 'Đồng Hành nhiệt tình gắn bó với bạn từ rất sớm. Thuộc phái Thiên Sách, tấn công mạnh mẽ, sát thương cực cao.',
                'image' => $img7,
                'order' => $i
            ]);
        }


        $img8 = md5(time()).'8.jpg';

        Image::make(public_path('frontend/images/img-tn.png'))->save(public_path('files/'. $img8));


        $icon = md5(time()).'.jpg';

        Image::make(public_path('frontend/images/i-cdcd.png'))->save(public_path('files/'. $icon));

        for ($i = 1 ; $i < 6 ; $i ++) {
            GameContent::create([
                'type' => config('constants.GAME_CONTENT_TYPE_FUNCTION_LIST'),
                'title' => 'Tính năng '.$i,
                'image' => $img8,
                'icon' => $icon,
                'order' => $i
            ]);
        }


    }

    public function run()
    {
        DB::statement("SET foreign_key_checks=0");

        Model::unguard();

        $countPosts = DB::table('posts')->count();
        $countCategories = DB::table('categories')->count();

        if ($countCategories == 0 && $countPosts == 0) {
            $this->generatePostAndCategories();
        }

        $countSettings = DB::table('settings')->count();

        if ($countSettings == 0) {
            $this->generateSettings();
        }

        $countGameContents = DB::table('game_contents')->count();

        if ($countGameContents == 0) {
            $this->generateGameContents();
        }

        Model::reguard();

        DB::statement("SET foreign_key_checks=1");
    }
}
