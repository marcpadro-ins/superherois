<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Http\Requests\StoreLangRequest;
use App\Http\Requests\UpdateLangRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langs = Lang::all();
        return view('langs.index', compact('langs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lang = new Lang();
        return view('langs.create', compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLangRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:langs,code',
        ]);

        $lang = new Lang();
        $lang->name = $request->name;
        $lang->code = $request->code;
        $lang->save();

        return redirect()->route('langs.index')
            ->with('success', 'Idioma creat correctament');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $language = DB::table('langs')->where('id', $id)->first();

        $categories = DB::table('category_lang')
            ->join('categories', 'category_lang.category_id', '=', 'categories.id')
            ->where('category_lang.lang_id', $id)
            ->get(['categories.id', 'category_lang.name']);

        return view('langs.show', [
            'language' => $language,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lang $lang)
    {
        return view('langs.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLangRequest $request, Lang $lang)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:langs,code,' . $lang->id,
        ]);

        $lang->name = $request->name;
        $lang->code = $request->code;
        $lang->save();

        return redirect()->route('langs.index')
            ->with('success', 'Idioma actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lang $lang)
    {
        $lang->delete();
        return Redirect::route('langs.index')
            ->with('success', 'Lang deleted successfully.');
    }
}
