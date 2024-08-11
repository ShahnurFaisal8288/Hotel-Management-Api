<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //categoryGet
    public function categoryGet(){
        $data = array();
        $data['active_menu'] = 'Category';
        $data['page_title'] = 'Category Add';
        return view('backend.category.categoryCreate',compact('data'));
    }
    //categoryPost
    public function categoryPost(){
        $category = new Category();
        $category->title = request('title');
        $category->save();
        return to_route('categoryList')->with('success','Category added Successfully');
    }
    //categoryList
    public function categoryList(){
        $data = array();
        $data['active_menu'] = 'CategoryList';
        $data['page_title'] = 'Category List';
        $category = Category::all();
        return view('backend.category.categoryList',compact('data','category'));
    }
    //categoryDelete
    public function categoryDelete($id){
        
        Category::find($id)->delete();
        return back()->with('success','Category Deleted Successfully');
    }
}
