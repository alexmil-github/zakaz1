<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Открытие страницы администратора
    public function admin_page()
    {
        if (Auth::user()->is_admin == 1) {
            $categories = Category::all();
            $orders = Order::all();
            return view('admin', ['categories' => $categories, 'orders' => $orders]);
        } else {
            return view('auth/login');
        }


    }

    public function create_category(Request $request)
    {
        if (Auth::user()->is_admin != 1) return redirect('/home'); //Проверка на админа

        Category::create($request->all());

        return back();
    }

    public function delete_category($id)
    {
//        $category = Category::find($id);
//        $category->delete();

        Category::find($id)->delete();
        return back();

    }
}
