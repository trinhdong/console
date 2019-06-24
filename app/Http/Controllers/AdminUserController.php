<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AdminUser;

class AdminUserController extends Controller
{
    public function index(Request $request) {
        $adminUsers = AdminUser::searchQuery(
            $request->input('id') ?? '',
            $request->input('name') ?? '',
            $request->input('email') ?? '',
        );
        return view('admin.admin-users.index', compact('adminUsers'));
    }

    public function add(AdminUserRequest $request) {
        $adminUser = new AdminUser();
        $adminUser->name = $request->input('name');
        $adminUser->email = $request->input('email');
        $adminUser->password = md5($request->input('password'));
        $adminUser->save();
        return redirect('admin/admin-users')->with(Controller::notification(ADD));
    }

    public function edit($id, AdminUserRequest $request) {
        $adminUser = AdminUser::find($id);
        if (md5($request->input('password')) === $adminUser->password) {
            $adminUser->name = $request->input('name');
            $adminUser->email = $request->input('email');
            $adminUser->password = md5($request->input('password_new'));
            $adminUser->save();
            return redirect('admin/admin-users')->with(Controller::notification(EDIT));
        }
        return redirect('admin/admin-users/edit/'.$id)->with(Controller::notification(PASSWORD_ERROR));
    }

    public function view($id) {
        $adminUser = AdminUser::find($id);
        return view('admin.admin-users.view', compact('adminUser'));
    }

    public function delete($id)
    {
        AdminUser::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }

    public function login(Request $request)
    {
        $arr = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::guard('admin_users')->attempt($arr)) {
            return redirect('/admin')->with(Controller::notification(LOGIN));
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
