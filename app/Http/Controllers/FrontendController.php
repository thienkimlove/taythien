<?php

namespace App\Http\Controllers;


use App\Category;
use App\GameContent;
use App\Post;
use App\Http\Requests;
use Cache;
use DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

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


        return view('frontend.index', compact('page', 'indexNewsPosts', 'indexNewsEvent', 'trailer', 'artWorkSliders'));
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


        return view('frontend.recommend', compact('page', 'charSliders', 'missionList', 'petSliders', 'skillList', 'togetherSliders', 'functionLists'));
    }

    public function gamer()
    {
        $page = 'tan-thu';

        $gamerQuery = DB::table('game_contents')
            ->orderBy('updated_at', 'desc')
            ->where('type', config('constants.GAME_CONTENT_TYPE_GAMER'));

        $gamers = $this->getResult($gamerQuery, 'gamers');


        return view('frontend.gamer', compact('page', 'gamers'));
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



        return view('frontend.library', compact('page', 'backgroundImages', 'videos', 'screenshots'));
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

        if ($request->ajax()) {
            $posts = ($request->input('type') == 'news') ? $newsPosts : $eventPosts;
            $view = view('frontend.load_posts',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.news', compact('page', 'newsPosts', 'eventPosts'));
    }

    public function landing()
    {
        $page = 'landing';

        $artWorkQuery = DB::table('game_contents')
            ->where('type', config('constants.GAME_CONTENT_TYPE_ARTWORK_SLIDER'))
            ->orderBy('order');

        $artWorkSliders = $this->getResult($artWorkQuery, 'index_artwork');

        return view('landing', compact('page', 'artWorkSliders'));
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

                return view('frontend.post', compact('post', 'page', 'relatedPosts'));
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
        }

        if( $agent->isAndroidOS() ){
            return redirect()->away($android_link);
        }

        return redirect()->away($apk_link);

    }
}
