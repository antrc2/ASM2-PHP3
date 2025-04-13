<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép mọi request (sửa tùy hệ thống phân quyền của bạn)
    }

    public function rules(): array
    {
        // Nếu là đăng nhập (POST tới /login chẳng hạn)
        if ($this->is('login')) {
            return [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ];
        }

        // Nếu là tạo tài khoản (POST tới /admin/accounts hoặc tương tự)
        return [
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // Đăng nhập
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',

            // Đăng ký / tạo tài khoản
            'fullname.required' => 'Vui lòng nhập họ tên.',
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.unique' => 'Email đã được sử dụng.',
        ];
    }
}
