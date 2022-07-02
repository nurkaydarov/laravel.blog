<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $categories = Category::query()->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'background' => 'nullable|image'
        ]);
        $data = $request->all();
        $data['background'] = Category::uploadImage($request);
        $category = Category::query()->create($data);
        //Category::create($request->all());
//        $request->session()->flash('success', 'Категория добавлена');
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $category = Category::query()->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'background' => 'nullable|image'
        ]);
        $category = Category::query()->find($id);
        $data = $request->all();

        if($file = Category::uploadImage($request, $request->background))
        {
            $data['background'] = $file;
        }
//        $category->slug = null;
        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
//        $category = Category::find($id);
//        $category->delete();
        $category = Category::query()->find($id);


        // Если у категорий привязана запись, то выводим ошибку
        if($category->posts->count())
        {
            return redirect()->route('categories.index')->with("error", "Ошибка у категорий '$category->title' есть записи");
        }
        $category->delete();
        //Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
