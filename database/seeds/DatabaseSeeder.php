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

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 1',
            'image' => $img2,
            'order' => 1
        ]);

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 2',
            'image' => $img2,
            'order' => 2
        ]);

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 3',
            'image' => $img2,
            'order' => 3
        ]);

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 4',
            'image' => $img2,
            'order' => 4
        ]);

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 5',
            'image' => $img2,
            'order' => 5
        ]);

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 6',
            'image' => $img2,
            'order' => 6
        ]);

        GameContent::create([
            'type' => config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'),
            'title' => 'artwork slide 7',
            'image' => $img2,
            'order' => 7
        ]);

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
