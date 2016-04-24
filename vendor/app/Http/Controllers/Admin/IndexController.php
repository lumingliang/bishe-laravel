<?php

namespace App\Http\Controllers\Admin;

use Request;

use App\Http\Controllers\Controller;
use DB;
use App\Bg_Tag;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('bg_posts')->orderBy('updated_at', 'desc')->paginate(10);
        $tags = Bg_Tag::all();
 //       var_dump($posts->fragment('foo')->url(2));
        return view('admin.index')->withPosts($posts)->withTitle('后台主页')->withTags($tags)->with('tagId', '');
    }

}
