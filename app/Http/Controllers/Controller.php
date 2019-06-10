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
        if ($notification == ADD) {
            return array(
                'message' => 'Thêm thành công!',
                'alert-type' => 'success'
            );
        }
        if ($notification == DELETE) {
            return array(
                'message' => 'Xóa thành công!',
                'alert-type' => 'error'
            );
        }
        if ($notification == EDIT) {
            return array(
                'message' => 'Sửa thành công!',
                'alert-type' => 'success'
            );
        }
        if ($notification == INFO) {
            return array(
                'message' => 'Thông tin!',
                'alert-type' => 'info'
            );
        }
        if ($notification == WARNING) {
            return array(
                'message' => 'Gặp lỗi!!!',
                'alert-type' => 'warning'
            );
        }
    }
}
