<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.backend.user.index');
    }
    public function getUser()
    {
        return User::where('userType', 'author')->get();
    }
    public function userInfo($id)
    {
        return User::find($id);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $file_path = public_path().$user->image;

        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $user->delete();

        return ResponseHelper::Out("success", "Author Deleted!", 200);
    }
}
