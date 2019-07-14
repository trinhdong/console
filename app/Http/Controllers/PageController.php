<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $newProducts = Product::query()->orderBy('created_at', 'desc')->paginate(4);
        $promotionProducts = Product::query()->orderBy('created_at', 'desc')->where('promotion_price', '!=', null)->paginate(4);
        return view('page.index', ['slides' => $slides, 'newProducts' => $newProducts, 'promotionProducts' => $promotionProducts]);
    }

    public function categories($id)
    {
        $categories = Category::query()->find($id);
        return view('page.category', compact('categories'));
    }

    public function productTypes($idCategory, $idProductType)
    {
        $categories = Category::query()->find($idCategory);
        $products = Product::query()->where('product_type_id', $idProductType)->get();
        return view('page.product_type', compact('products', 'categories', 'idProductType'));
    }

    public function productDetail($id)
    {
        $productDetail = Product::query()->where('id', $id)->first();
        $newProducts = Product::query()->orderBy('created_at', 'desc')->paginate(4);
        $productSames = Product::query()->where('product_type_id', $productDetail->product_type_id)->paginate(3);
        $randProducts = Product::query()->orderBy('created_at', 'desc')->take(100)->take(4)->get();
        return view('page.products_details', compact('productDetail', 'newProducts', 'productSames', 'randProducts'));
    }

    public function getContact()
    {
        return view('page.contact');
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(UserRequest $request)
    {
        $login = array('email' => $request->input('email'), 'password' => $request->input('password'));
        if (Auth::attempt($login)) {
            return redirect('/')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
        }
        return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập thất bại']);

    }

    public function getSignUp()
    {
        return view('page.sign_up');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|unique:users,email',
                'name' => 'required',
                'password' => 'required|min:6|max:20',
                'password_same' => 'required|same:password',
                'address' => 'required',
                'phone' => 'required|min:9|max:10'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã tồn tại, mời nhập lại',
                'password.required' => 'Vui lòng nhập password',
                'fullname.required' => 'Vui lòng nhập họ tên',
                'password2.same' => 'Mật khẩu không trùng khớp, mời nhập lại',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 kí tự',
                'adress.required' => 'Vui lòng nhập địa chỉ',
                'name.required' => 'Vui lòng nhập họ tên',
                'phone.min' => 'Số điện thoại không hợp lệ',
                'phone.max' => 'Số điện thoại không hợp lệ'
            ]);
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = intval($request->input('phone'));
        $users->password = Hash::make($request->input('password'));
        $users->address = $request->input('address');
        $users->sex = intval($request->input('gender'));
        $users->save();
        return redirect('/')->with('success', 'Đăng kí thành công');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function loginCheckout(UserRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $login = array('email' => $email, 'password' => $password);
        if (Auth::attempt($login)) {
            return redirect('dat-hang')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
        }
        return redirect('dat-hang')->with(['flag' => 'danger', 'message' => 'Đăng nhập thất bại']);
    }

    public function signUpCheckout(Request $request)
    {
//        $this->validate($request,
//            [
//                'email' => 'required|unique:users,email',
//                'name' => 'required',
//                'password' => 'required|min:6|max:20',
//                'password_same' => 'required|same:password',
//                'address' => 'required',
//                'phone' => 'required|min:9|max:10'
//            ],
//            [
//                'email.required' => 'Vui lòng nhập email',
//                'email.email' => 'Không đúng định dạng email',
//                'email.unique' => 'Email đã tồn tại, mời nhập lại',
//                'password.required' => 'Vui lòng nhập password',
//                'fullname.required' => 'Vui lòng nhập họ tên',
//                'password2.same' => 'Mật khẩu không trùng khớp, mời nhập lại',
//                'password.min' => 'Mật khẩu phải chứa ít nhất 6 kí tự',
//                'adress.required' => 'Vui lòng nhập địa chỉ',
//                'name.required' => 'Vui lòng nhập họ tên',
//                'phone.min' => 'Số điện thoại không hợp lệ',
//                'phone.max' => 'Số điện thoại không hợp lệ'
//            ]);
        $customer = new User;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->address = $request->input('address');
        $customer->phone = intval($request->input('phone'));
        $customer->sex = intval($request->input('gender'));
        $customer->save();
        if ($customer !== null) {
            $login = array('email' => $request->input('email'), 'password' => $request->input('password'));
            if (Auth::attempt($login)) {
                return redirect('dat-hang')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
            } else {
                return redirect('dat-hang')->with(['flag' => 'danger', 'message' => 'Đăng nhập thất bại']);
            }
        }
        return redirect('dat-hang');
    }

    public function getSearch(Request $request)
    {
        $products = Product::query()->where('product_name', $request->input('product_name'))->get();
        return view('page.search', compact('products'));
    }

    public function getSearchAjax(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('products')
                ->where('product_name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li><a href="data/' . $row->id . '">' . $row->product_name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
