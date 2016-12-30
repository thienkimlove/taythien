<?php

namespace App\Http\Controllers;


use App;
use App\Category;
use App\GameContent;
use App\Post;
use App\Http\Requests;
use Cache;
use DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use URL;

class FrontendController extends Controller
{
    public $cache_enabled;

    public function __construct()
    {
        $this->cache_enabled = (env('CACHE_ENABLE') == 1) ? true : false;
    }

    protected function getResult($query, $cacheKey)
    {
        if ($this->cache_enabled) {
            return Cache::remember($cacheKey, config('constants.FRONTEND_CACHE_TIME'), function() use ($query) {
                return $query->get();
            });
        } else {
            return $query->get();
        }
    }

    public function index()
    {
        $page = 'index';

        $indexPostNewsQuery = DB::table('posts')
            ->where('status', true)
            ->where('category_id', config('constants.NEWS_CATEGORY_ID'))
            ->latest('updated_at')
            ->limit(3);


        $indexNewsPosts = $this->getResult($indexPostNewsQuery, 'index_post_news');

        $indexPostEventQuery = DB::table('posts')
            ->where('status', true)
            ->where('category_id', config('constants.EVENT_CATEGORY_ID'))
            ->latest('updated_at')
            ->limit(3);


        $indexNewsEvent = $this->getResult($indexPostEventQuery, 'index_post_event');

        $indexPostGuideQuery = DB::table('posts')
            ->where('status', true)
            ->where('category_id', config('constants.GUIDE_CATEGORY_ID'))
            ->latest('updated_at')
            ->limit(3);


        $indexNewsGuide = $this->getResult($indexPostGuideQuery, 'index_post_guide');

        $trailerQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_TRAILER'))
            ->latest('updated_at')
            ->limit(1);

        $trailer = $this->getResult($trailerQuery, 'index_trailer');

        if (count($trailer) > 0) {
            $trailer = array_first($trailer);
        }

        $artWorkQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'))
            ->orderBy('order');

        $artWorkSliders = $this->getResult($artWorkQuery, 'index_artwork');

        $meta_title = 'Tây Thiên Ký';
        $meta_desc  = 'Tây Thiên Ký';
        $meta_keywords = 'Tây Thiên Ký';
        $meta_image = url('frontend/images/favicon.ico');
        $meta_url = url('/');


        return view('frontend.index', compact(
            'page',
            'indexNewsPosts',
            'indexNewsEvent',
            'indexNewsGuide',
            'trailer',
            'artWorkSliders',
            'meta_title',
            'meta_desc',
            'meta_keywords',
            'meta_image',
            'meta_url'
        ));
    }

    public function recommend()
    {
        $page = 'gioi-thieu';

        $characterQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_CHARACTER_SLIDER'))
            ->orderBy('order');

        $charSliders = $this->getResult($characterQuery, 'recommend_slider');

        $missionListQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_MISSION_LIST'))
            ->orderBy('order');

        $missionList = $this->getResult($missionListQuery, 'recommend_mission');

        $petSliderQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_PET_SLIDER'))
            ->orderBy('order');

        $petSliders = $this->getResult($petSliderQuery, 'recommend_pet');

        $skillListQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_SKILL_LIST'))
            ->orderBy('order');

        $skillList = $this->getResult($skillListQuery, 'recommend_skill');

        $togetherQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_TOGETHER_SLIDER'))
            ->orderBy('order');

        $togetherSliders = $this->getResult($togetherQuery, 'recommend_together');

        $functionListQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_FUNCTION_LIST'))
            ->orderBy('order');

        $functionLists = $this->getResult($functionListQuery, 'recommend_function');

        $meta_title = 'Tây Thiên Ký';
        $meta_desc  = 'Tây Thiên Ký';
        $meta_keywords = 'Tây Thiên Ký';
        $meta_image = url('frontend/images/favicon.ico');
        $meta_url = url('gioi-thieu');


        return view('frontend.recommend', compact(
            'page',
            'charSliders',
            'missionList',
            'petSliders',
            'skillList',
            'togetherSliders',
            'functionLists',
            'meta_title',
            'meta_desc',
            'meta_keywords',
            'meta_image',
            'meta_url'
        ));
    }

    public function gamer()
    {
        $page = 'tan-thu';

        $gamerQuery = DB::table('game_contents')
            ->orderBy('updated_at', 'desc')
            ->where('type', config('constants.GAME_CONTENT_TYPE_GAMER'));

        $gamers = $this->getResult($gamerQuery, 'gamers');

        $meta_title = 'Tây Thiên Ký';
        $meta_desc  = 'Tây Thiên Ký';
        $meta_keywords = 'Tây Thiên Ký';
        $meta_image = url('frontend/images/favicon.ico');
        $meta_url = url('tan-thu');


        return view('frontend.gamer', compact(
            'page',
            'gamers',
            'meta_title',
            'meta_desc',
            'meta_keywords',
            'meta_image',
            'meta_url'
        ));
    }

    public function library()
    {
        $page = 'thu-vien';

        $backgroundImages = GameContent::latest('updated_at')
            ->where('type', config('constants.GAME_CONTENT_TYPE_LIBRARY_BACKGROUND'))->get();


        $videos = GameContent::latest('updated_at')
            ->where('type', config('constants.GAME_CONTENT_TYPE_LIBRARY_VIDEO'))->get();


        $screenshots = GameContent::latest('updated_at')
            ->where('type', config('constants.GAME_CONTENT_TYPE_LIBRARY_SCREENSHOTS'))->get();

        $meta_title = 'Tây Thiên Ký';
        $meta_desc  = 'Tây Thiên Ký';
        $meta_keywords = 'Tây Thiên Ký';
        $meta_image = url('frontend/images/favicon.ico');
        $meta_url = url('thu-vien');


        return view('frontend.library', compact(
            'page',
            'backgroundImages',
            'videos',
            'screenshots',
            'meta_title',
            'meta_desc',
            'meta_keywords',
            'meta_image',
            'meta_url'
        ));
    }

    public function news(Request $request)
    {
        $page = 'tin-tuc';

        $newsPosts = DB::table('posts')
            ->where('status', true)
            ->where('category_id', config('constants.NEWS_CATEGORY_ID'))
            ->latest('updated_at')
            ->paginate(2);

        $eventPosts = DB::table('posts')
            ->where('status', true)
            ->where('category_id', config('constants.EVENT_CATEGORY_ID'))
            ->latest('updated_at')
            ->paginate(2);

        $guidePosts = DB::table('posts')
            ->where('status', true)
            ->where('category_id', config('constants.GUIDE_CATEGORY_ID'))
            ->latest('updated_at')
            ->paginate(2);

        if ($request->ajax()) {
            if ($request->input('type') == 'news') {
                $posts = $newsPosts;
            } else if ($request->input('type') == 'event') {
                $posts = $eventPosts;
            } else {
                $posts = $guidePosts;
            }

            $view = view('frontend.load_posts',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }

        $meta_title = 'Tây Thiên Ký';
        $meta_desc  = 'Tây Thiên Ký';
        $meta_keywords = 'Tây Thiên Ký';
        $meta_image = url('frontend/images/favicon.ico');
        $meta_url = url('tin-tuc');

        return view('frontend.news', compact(
            'page',
            'newsPosts',
            'eventPosts',
            'guidePosts',
            'meta_title',
            'meta_desc',
            'meta_keywords',
            'meta_image',
            'meta_url'
        ));
    }

    public function landing()
    {
        $page = 'landing';

        $artWorkQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'))
            ->orderBy('order');

        $artWorkSliders = $this->getResult($artWorkQuery, 'index_artwork');

        $meta_title = 'Tây Thiên Ký';
        $meta_desc  = 'Tây Thiên Ký';
        $meta_keywords = 'Tây Thiên Ký';
        $meta_image = url('frontend/images/favicon.ico');
        $meta_url = url('landing');


        return view('landing', compact(
            'page',
            'artWorkSliders',
            'meta_title',
            'meta_desc',
            'meta_keywords',
            'meta_image',
            'meta_url'
        ));
    }



    public function main($value)
    {
        if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {
            $post = Post::where('slug', $matches[1])->get();
            if ($post->count() > 0) {
                $post = $post->first();
                //$post->update(['views' => (int) $post->views + 1]);
                $page = 'tin-tuc';

                $relatedQuery = DB::table('posts')
                    ->where('status', true)
                    ->where('category_id', $post->category_id)
                    ->latest('updated_at')
                    ->limit(3);

                $relatedPosts = $this->getResult($relatedQuery, 'post_detail_'.$post->id);

                $meta_title = $post->title;
                $meta_desc  = $post->desc;
                $meta_keywords = 'Tây Thiên Ký';
                $meta_image = url('img/cache/600x315', $post->image);
                $meta_url = url($post->slug.'.html');

                return view('frontend.post', compact(
                    'post',
                    'page',
                    'relatedPosts',
                    'meta_title',
                    'meta_desc',
                    'meta_keywords',
                    'meta_image',
                    'meta_url'
                ));
            }

        }
    }

    public function download(Request $request)
    {
        $campaign_name = $request->input('campaign_name');

        $agent = new Agent();

        $settings = DB::table('settings')->lists('value', 'key_value');

        $ios_link = ($campaign_name) ? str_replace('Campaign_Name', $campaign_name, $settings['link_play_appstore']) : $settings['link_play_appstore'];
        $android_link = ($campaign_name) ? str_replace('Campaign_Name', $campaign_name, $settings['link_play_googleplay']) : $settings['link_play_googleplay'];
        $apk_link = ($campaign_name) ? str_replace('Campaign_Name', $campaign_name, $settings['link_play_apk']) : $settings['link_play_apk'];

        // Check for a specific platform with the help of the magic methods:

        if( $agent->isiOS() ){
           return redirect()->away($ios_link);
        } else {
            return redirect()->away($android_link);
        }

      /*  if( $agent->isAndroidOS() ){
            return redirect()->away($android_link);
        }

        return redirect()->away($apk_link);*/

    }

    public function feed()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            $posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = 'Tay Thien Ky RSS';
            $feed->description = 'Tay Thien Ky RSS';
            $feed->logo = 'http://taythien.garena.vn/frontend/images/ttk.png';
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->created_at;
            $feed->lang = 'en';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add($post->title, 'Tay Thien Ky', URL::to($post->slug.'.html'), $post->created_at, $post->desc, $post->desc);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('rss');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }

    public function ajax()
    {
        $msg = null;
        if (!session()->has('already_get_give_code')) {
            $giftCodeCount = App\Code::where('is_give', false)->count();
            if ($giftCodeCount > 0) {
              $giftCode =  App\Code::where('is_give', false)->limit(1)->get();
              $giftCode = $giftCode->first();
              $giftCode->update(['is_give' => true]);
              session()->put('already_get_give_code', 1);
              $msg = $giftCode->code;
            } else {
                $msg = 'Hết giftcode!';
            }
        } else {
            $msg = 'Bạn đã nhận rồi!';
        }

        return response()->json(['msg' => $msg]);

    }
}
