<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\User;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex()
    {
    	$slide = Slide::all();
    	$new_products = Product::orderBy('product_name', 'desc')->paginate(4);
        //$rand_products =Product::inRandomOrder();
    	return view('page.index',['slide' => $slide], ['new_products' =>$new_products]);
    }

    public function getProductstype($id)
    {
        $category_id = $id;
        $get_id_type = ProductType::where('category_id' , $category_id)->pluck('id');
        $rand_products = Product::whereIn('product_type_id', $get_id_type)->paginate(8);
        $product_type = ProductType::where('category_id' , $id)->get();
    	return view('page.products_type' , compact('rand_products', 'product_type', 'category_id'));
    }

    public function getProductsByType($category_id, $id)
    {
        //truyền id của category vào để lấy được type_name của product_type
        $category_id = $category_id;
        $product_type = ProductType::where('category_id' , $category_id)->get();
        $products = Product::join('product_types', 'products.product_type_id', 'product_types.id')
            ->select('products.product_name','products.id')
            ->where('products.product_type_id', $id)
            ->get();
        $product_by_type = Product::where('product_type_id', $id)->paginate(8); 
        //Lấy tên loại sản phẩm
        $products_type = ProductType::where('id', $id)->first(); 
        return view('page.products_by_type',compact('category_id', 'product_type' , 'products', 'product_by_type', 'products_type'));
    }

    public function getProductDetails(Request $request)
    {
        $products_details = Product::where('id',$request->id)->first();
        $new_products = Product::orderBy('product_name', 'desc')->paginate(4);
        $sptt = Product::where('product_type_id', $products_details->product_type_id)->paginate(3);
        $rand_products =Product::inRandomOrder()->take(6)->get();
    	return view('page.products_details', compact('products_details', 'new_products', 'sptt', 'rand_products'));
    }

    public function getContact()
    {
    	return view('page.contact');
    }

    public function getSearch(Request $request)
    {
        $products = Product::where('product_name', $request->product_name)->get();

        return view('page.search', compact('products'));
    }

    public function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
            ->where('product_name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="data/'. $row->id .'">'.$row->product_name.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' =>'Vui lòng nhập email',
                'email.email' =>'Email bạn nhập không hợp lệ',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' =>'Mật khẩu phải chứa ít nhất 6 kí tự',
                'password.max' => 'Mật khẩu không vượt quá 20 kí tự'
            ]);

        $login = array('email' => $request->input('email'), 'password' => $request->input('password'));
        if(Auth::attempt($login)){
            return redirect('/')->with(['flag'=>'success', 'message'=>'Đăng nhập thành công']);
        }
        else{
        return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập thất bại']);
        }
    }

    public function getSignin()
    {
        return view('page.signup');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|unique:users,email',
                'fullname' => 'required',
                'password' => 'required|min:6|max:20',  
                'password2' => 'required|same:password',
                'adress' => 'required',
                'phone'=>'required|min:9|max:10'
            ],

            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' =>'Không đúng định dạng email',
                'email.unique' => 'Email đã tồn tại, mời nhập lại',
                'password.required' => 'Vui lòng nhập password',
                'fullname.required' => 'Vui lòng nhập họ tên',
                'password2.same' => 'Mật khẩu không trùng khớp, mời nhập lại',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 kí tự',
                'adress.required' => 'Vui lòng nhập địa chỉ',
                'name.required' => 'Vui lòng nhập họ tên',
                'phone.min'=>'Số điện thoại không hợp lệ',
                'phone.max'=>'Số điện thoại không hợp lệ'
            ]);
        $users = new User;
        $users->name = $request->input('fullname');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->password = Hash::make($request->password); 
        $users->address = $request->input('adress');
        $users->sex = $request->sex;
        $users->phone = $request->phone;

        $users->save();

        return redirect('/')->with('thanhcong', 'Đăng kí thành công');

    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
