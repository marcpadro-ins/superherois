<?php

namespace App\Http\Controllers;

// use App\Models\Category;
// use App\Models\Lang;
// use Illuminate\Support\Facades\DB;
// use App\Http\Requests\StoreCategoryRequest;
// use App\Http\Requests\UpdateCategoryRequest;
// use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    // public function translate() : View 
    // {
    //     $languages = Lang::all();
    //     $categories = Category::all();
    //     $middle = DB::table('category_lang')->get();

    //     return view('translate.translate', compact('languages', 'categories'));
    // }

    public function translate(): View
    {
        $languages = Lang::all();
        $categories = Category::all();
        $pivots = DB::table('category_lang')->get();

        return view('translate.translate', compact('languages', 'categories', 'pivots'));          
    }

    public function storeTranslate(Request $request): RedirectResponse
    {
        $category = Category::find($request->category_id);
        $lang_id = $request->language_id;
        $name = $request->name;

        $category->langs()->attach($lang_id, ['name' => $name, 'created_at' => now(), 'updated_at' => now()]);

        return Redirect::route('translate.translate')
            ->with('success', 'Category translated successfully');
    }

    public function destroyTranslate(Lang $lang): RedirectResponse
    {
        $category = Category::find($lang->pivot->category_id);
        $category->langs()->detach($lang->id);

        return Redirect::route('translate.translate')
            ->with('success', 'Translation deleted successfully');
    }
}
