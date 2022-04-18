<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->categoryName();
        $category = new Category();
        // Session::flash('success', 'Category Created!');
        return view('categories.create', [
            'parents' => $parents,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //Validation
        $request->validated();

        // $category = new Category();
        // $categoy->name = $request->input('name');
        // $categoy->description = $request->input('description');
        // $categoy->slug = Str::slug($categoy->name);
        // $categoy->parent_id = $request->input('parent_id');
        // $categoy->art_path = $request->input('art_path');
        // $categoy->save();
        if ($request->hasFile('art_path')) {
            $file = $request->file('art_path');
            if ($file->isValid()) {
                $path = $file->store('uploads/art_path', [
                    'disk' => 'public',
                ]);

            }

        }
        $data = $request->all();
        if (!$data['slug']) {
            $data['slug'] = Str::slug($data['name']);
        };
        Category::create($data);
        Session::flash('success', 'Category Created!');
        return redirect()->back();

        // dd(
        //     $request->input('name'),
        //     $request->query('name'),
        //     $request->post('name'),
        //     $request['name'],
        //     $request->get('name')

        // );
    }
    public function show($id)
    {
        return 'Show Page';
    }
    public function index()
    {
        $categories = Category::paginate(5, '*', 'p');
        // $categories = Category::get();
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) /*Category $category*/
    {
        $category = Category::findOrFail($id);
        dd($category);
        $parents = $this->categoryName();
        return view('categories.edit', [
            'category' => $category,
            'parents' => $parents,
        ]);
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(ProjectRequest $request, $id) /*Category $category*/
    {
        $request->validated();
        $category = Category::findOrFail($id);
        if ($request->hasFile('art_path')) {
            $file = $request->file('art_path');
            if ($file->isValid()) {
                $file->store('/art-path', [
                    'disk' => 'public',
                ]);

            }
        }
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->slug = Str::slug($category->name);
        $category->parent_id = $request->input('parent_id');
        $category->art_path = $request->input('art_path');
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Category::findOrFail($id);
        Category::destroy($id);
        return redirect()->back()->with('success', 'Categoey Deleted!');
    }
    protected function categoryName()
    {
        return [
            'Category::id()' => 'web Development',
            'Mobile Development',
            'Games Development',
        ];
    }
}
