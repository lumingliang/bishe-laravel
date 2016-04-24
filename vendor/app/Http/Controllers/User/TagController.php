<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bg_Tag;
use DB;

class TagController extends Controller {
	public function destroy($id)
	{
		Bg_Tag::find($id)->delete();
		return;
	}
}