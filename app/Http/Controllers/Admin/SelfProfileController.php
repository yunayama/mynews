<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\History;
use Carbon\Carbon;

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
    $profile->fill($form);
    $profile->save();

    return redirect('admin/profile');
}

public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

  public function edit(Request $request)
  {
      $profile = Profile::find($request->id);
      if(empty($profile)){
          abort(404);
      }
      return view('admin.profile.edit', ['profile_form' =>$profile]);
  }

  public function update(ProfileRequest $request)
  {
    $this->validate($request, Profile::$rules);
    $profile = Profile::find($request->input('id'));
    $profile_form = $request->all();

      unset($profile_form['_token']);

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();

      $history = new History;
      $history->profile_id = $profile->id;
      $history->edited_at = Carbon::now('Asia/Tokyo');
      $history->save();

      return redirect('admin/profile');
  }

  public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        // 削除する
        $profile->delete();
        return redirect('admin/profile/');
    }
}
