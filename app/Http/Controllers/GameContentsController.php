<?php

namespace App\Http\Controllers;

use App\GameContent;
use App\Http\Requests\GameContentRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class GameContentsController extends AdminController
{
    public $types;
    public $orders;

    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->types = $this->orders = ['' => 'Choose'];

        foreach (config('constants') as $key => $config) {
            if (strpos($key, 'GAME_CONTENT_TYPE') !== false) {
                $this->types[$config] = str_replace('_', ' ', str_replace('GAME_CONTENT_TYPE', '', $key));
            }
        }
        for ($i = 1; $i < 15; $i ++) {
            $this->orders[$i] = $i;
        }
    }


    public function index(Request $request)
    {

        $searchContent = '';
        $searchType = '';
        $gameContents = GameContent::latest('updated_at');
        if ($request->input('q')) {
            $searchContent = urldecode($request->input('q'));
            $gameContents = $gameContents->where('title', 'LIKE', '%'. $searchContent. '%');
        }

        if ($request->input('type')) {
            $searchType = $request->input('type');
            $gameContents = $gameContents->where('type', '=', $searchType);
        }

        $gameContents = $gameContents->paginate(env('ITEM_PER_PAGE'));

        return view('admin.game_content.index', compact('gameContents', 'searchContent', 'searchType'));
    }

    public function create()
    {
        $types = $this->types;
        $orders = $this->orders;
        return view('admin.game_content.form', compact('types', 'orders'));
    }

    public function store(GameContentRequest $request)
    {
        $data = $request->all();
        $data['image'] =  ($request->file('image') && $request->file('image')->isValid()) ? $this->saveImage($request->file('image')) : '';
        $data['icon'] =  ($request->file('icon') && $request->file('icon')->isValid()) ? $this->saveImage($request->file('icon')) : '';

        GameContent::create($data);
        flash('Create game content success!', 'success');
        return redirect('admin/game_contents');
    }

    public function edit($id)
    {
        $game_content = GameContent::find($id);
        $types = $this->types;
        $orders = $this->orders;
        return view('admin.game_content.form', compact('game_content', 'types', 'orders'));
    }

    public function update($id, GameContentRequest $request)
    {
        $data = $request->all();
        $game_content = GameContent::find($id);
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $game_content->image);
        }

        if ($request->file('icon') && $request->file('icon')->isValid()) {
            $data['icon'] = $this->saveImage($request->file('icon'), $game_content->icon);
        }

        $game_content->update($data);
        flash('Update game content success!', 'success');
        return redirect('admin/game_contents');
    }

    public function destroy($id)
    {
        $game_content = GameContent::find($id);
        if (file_exists(public_path('files/' . $game_content->image))) {
            @unlink(public_path('files/' . $game_content->image));
        }

        if (file_exists(public_path('files/' . $game_content->icon))) {
            @unlink(public_path('files/' . $game_content->icon));
        }
        $game_content->delete();
        flash('Success deleted game content!');
        return redirect('admin/game_contents');
    }

}
