<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Thực hiện xác thực thủ công
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validated) {
                $userInfo = Account::where('email', $request->email)->first();
                if ($userInfo == NULL) {
                    return redirect("/login")->with("error", "Không tìm thấy tài khoản");
                } else {
                    if (Hash::check($request->password, $userInfo->password)) {
                        Auth::login($userInfo);
                        return redirect("/")->with('success', 'Đăng nhập thành công');
                    } else {
                        return redirect("/login")->with("error", "Sai mật khẩu");
                    }
                }
            }
        } else {
            if (Auth::user()){
                return redirect("/")->with("error","Bạn đã đăng nhập rồi");
            }
            return view("account.login");
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        return redirect("/")->with("success","Đăng xuất thành công"); // Chuyển hướng về trang chủ
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
