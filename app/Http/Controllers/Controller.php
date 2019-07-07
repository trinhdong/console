<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function notification($notification = '')
    {
        if ($notification === ADD) {
            return array(
                'message' => 'Thêm thành công!',
                'alert-type' => 'success'
            );
        }
        if ($notification === DELETE) {
            return array(
                'message' => 'Xóa thành công!',
                'alert-type' => 'success'
            );
        }
        if ($notification === DELETE_ERROR) {
            return array(
                'message' => 'Không được phép xóa!',
                'alert-type' => 'error'
            );
        }
        if ($notification === EDIT) {
            return array(
                'message' => 'Sửa thành công!',
                'alert-type' => 'success'
            );
        }
        if ($notification === INFO) {
            return array(
                'message' => 'Thông tin!',
                'alert-type' => 'info'
            );
        }
        if ($notification === WARNING) {
            return array(
                'message' => 'Gặp lỗi!!!',
                'alert-type' => 'warning'
            );
        }
        if ($notification === LOGIN) {
            return array(
                'message' => 'Đăng nhập thành công!',
                'alert-type' => 'success'
            );
        }
        if ($notification === PASSWORD_ERROR) {
            return array(
                'message' => 'Vui lòng nhập chính xác mật khẩu hiện tại!',
                'alert-type' => 'error'
            );
        }
        if ($notification === ORDER_SUCCESS) {
            return array(
                'message' => 'Cập nhật thành công!',
                'alert-type' => 'success'
            );
        }
    }
}
