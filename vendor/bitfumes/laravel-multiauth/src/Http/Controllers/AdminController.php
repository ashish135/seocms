<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;
use App\User;

class AdminController extends Controller
{
    use AuthorizesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    public function index()
    {
        $currAdmin = Auth::user();
        $id = Auth::user()->id;
        if ($currAdmin->roles[0]->name !== "super") {
            foreach ($currAdmin->roles as $role) {
                if ($role->name == "content writer") {
                    $content = Content::where('assign_to', Auth::user()->id)->paginate(10);
                    return view('multiauth::admin.homepage', compact('content', 'id'));
                }else if ($role->name == "graphic designer") {
                    $graphic = Graphic::where('assign_to', Auth::user()->id)->paginate(10);
                    return view('multiauth::admin.homepage', compact('graphic', 'id'));
                }else if ($role->name == "team lead") {
                    $graphic = Graphic::where('assign_to', Auth::user()->id)->paginate(10);
                    return view('multiauth::admin.homepage', compact('graphic', 'id'));
                }
            }
        }
        return view('superadmin.home');
    }

    public function show()
    {
        $admins = Admin::where('id', '!=', auth()->id())->get();

        return view('multiauth::admin.show', compact('admins'));
    }

    public function showChangePasswordForm()
    {
        return view('multiauth::admin.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed',
        ]);
        auth()->user()->update(['password' => bcrypt($data['password'])]);

        return redirect(route('admin.home'))->with('message', 'Your password is changed successfully');
    }
}
