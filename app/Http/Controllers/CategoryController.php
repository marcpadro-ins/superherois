<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
        $category = new Category();

        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        $englishLang = Lang::where('code', 'en')->first();

        if ($englishLang) {
            $category->langs()->attach($englishLang->id, ['name' => $category->name, 'created_at' => now(), 'updated_at' => now()]);
        }

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $languages = DB::table('category_lang')
            ->join('langs', 'category_lang.lang_id', '=', 'langs.id')
            ->where('category_lang.category_id', $category->id)
            ->get(['langs.code as lang_code', 'category_lang.name']);

        return view('category.show', [
            'category' => $category,
            'languages' => $languages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('category.index')
            ->with('success', 'Category deleted successfully');
    }

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

    public function destroyTranslate(Category $category, Lang $lang): RedirectResponse
    {
        $category->langs()->detach($lang->id);

        return Redirect::route('translate.translate')
            ->with('success', 'Translation deleted successfully');
    }
}
