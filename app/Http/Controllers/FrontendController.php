<?php

namespace App\Http\Controllers;


use App\Category;
use App\Post;
use App\Http\Requests;
use Cache;
use DB;

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
  

    public function category($value)
    {
        $category = Category::where('slug', $value)->first();

        if ($category->subCategories->count() == 0) {
            //child categories
            $posts = Post::publish()
                ->where('category_id', $category->id)
                ->latest('updated_at')
                ->limit(5)->get();
            $page = ($category->parent_id) ? $category->parent->slug : $category->slug;

        } else {
            //parent categories
            $page = $category->slug;
            $posts = Post::publish()
                ->whereIn('category_id', $category->subCategories->lists('id')->all())
                ->latest('updated_at')
                ->limit(5)->get();

        }

        return view('frontend.category', compact(
            'category', 'posts', 'page'
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

                return view('frontend.post', compact('post', 'page', 'relatedPosts'));
            }

        }
    }
}
