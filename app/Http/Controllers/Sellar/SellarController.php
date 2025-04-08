<?php

namespace App\Http\Controllers\Sellar;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Models\Sellar\Sellar;
use Illuminate\Support\Facades\Redirect;
use Auth;
use File;

class SellarController extends Controller
{
    //
    public function displayCategories(){
       
        $allCategories = Category::select()->orderBy('id','desc')->get();

        return view('sellars.allcategories', compact('allCategories'));
    }

    public function createCategories(){
       

        return view('sellars.create');
    }
    //

    public function storeCategories(Request $request){
       
        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);


        $storeCategories = Category::create([
            "icon" => $request->icon,
            "name" => $request->name,
            "image" => $myimage,
        ]);
        if($storeCategories){
            return Redirect::route("sellars.allcategories")->with(['success' => 'Category created successfully!']);
        }
    }

    public function editCategories($id){
       
        $category = Category::find($id);

        return view('sellars.edit',compact('category'));
    }

    public function updateCategories(Request $request,$id){

        $updateCategories = Category::find($id);

        $updateCategories->update($request->all());

        if($updateCategories){
            return Redirect::route("sellars.allcategories")->with(['update' => 'Category updated successfully!']);
        }
    }

    public function deleteCategories($id){

        $category = Category::find($id);

        if(File::exists(public_path('assets/images/' . $category->image))){
            File::delete(public_path('assets/images/' . $category->image));
        }else{
            //dd('File does not exists.');
        }

        $category->delete();

        if($category){
            return Redirect::route("sellars.allcategories")->with(['delete' => 'Category deleted successfully!']);
        }
    }

    public function displayProducts(){
       
        $allProducts = Product::select()->orderBy('id','desc')->get();

        return view('sellars.allproducts', compact('allProducts'));
    }

}
