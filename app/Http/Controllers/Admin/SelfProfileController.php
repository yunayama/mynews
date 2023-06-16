<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

class SelfProfileController extends Controller
{
    public function add()
{
    return view('admin.profile.create');
}

public function create(ProfileRequest $request)
{
    $profile = new Profile();
    $form = $request->all();
    unset($form['_token']);
    $profile->timestamps = false;
    $profile->fill($form);
    $profile->save();


    return redirect('admin/profile/create');
}

public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_title)->get();
      } else {
          // それ以外はすべてのプロフィールを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

public function edit()
{
    return view('admin.profile.edit');
}

public function update()
{
    return redirect('admin/profile/edit');
}

}
