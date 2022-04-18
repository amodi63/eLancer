<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ProjectsRequest;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
use App\View\Components\flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $projects = $user->project()->paginate();
        // dd($projects);
        return view('client.projects.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = ['open', 'on-hold', 'closed'];
        return view('client.projects.create', [
            'projects' => new Project(),
            'status' => $status,
        ])->with('success', 'Project Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsRequest $request)
    {
        return $request;
        $request->validated();
        $user = Auth::user();
        if ($request->has('attachments')) {
            $file = $request->file('attachments');
            // $paths = [];
            foreach ($file as $file) {
                if ($file->isValid()) {
                    $file->$this->uploadFile('uploads', $file);

                }
            }
        }
        // dd($request->attachments);
        // $request->user();
        // $projects = $user->project;
        // dd($projects);
        // $project = Project::create($request->all());
        // $request->merge([
        //     'user_id' => Auth::id(),
        //     'user_id' => $request->user()->id(),
        // ]);
        $projects = $user->project()->create($request->all()); //=> laravel Pass user_id for Project Model
        Session::flash('success', 'Project Added');
        return redirect()->route('client.projects.create')->with('projects', $projects);
    }

    public function uploadFile($folder, $file)
    {
        $file->store('/', $folder);
        $filename = $file->hashName();
        return $filename;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $projects = $user->project()->findOrFail($id);
        return view('client.projects.show', with([
            'projects' => $projects,
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = ['open', 'on-hold', 'closed'];
        $user = Auth::user();
        $projects = $user->project()->findOrFail($id);
        dd($projects->attachments);
        return view('client.projects.edit', with([
            'projects' => $projects,
            'status' => $status,
        ]));
        // return redirect()->route('client.projects.edit')->with([
        //     'projects' =>  $projects,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProjectsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectsRequest $request, $id)
    {
        $request->validated();
        $user = Auth::user();
        $projects = $user->project()->findOrFail($id);
        $projects->update($request->all());
        $tags = explode(',', $request->input('tags'));
        $tag_id = [];
        foreach ($tags as $tag_name) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug($tag_name), //In Crate Will Cheak 2 Arrays
            ], ['name' => trim($tag_name)]); //In update Will Cheak the First Array
            $tag_id = $tag_id;
        };
        $projects->tags()->sync($tag_id);
        dd($projects);
        return redirect()->route('client.projects.index')->with([
            'projects' => $projects,
            'success' => 'Projects Updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Project::where('user_id', Auth::id)->where('id', $id)->delete();
        $user = Auth::user();
        $projects = Project::where('id', $id)->where('user_id', $user->id)->delete();
        Session::flash('danger', 'Project Deleted');
        return redirect()->back()->with([
            'projects' => $projects,
        ]);
    }
}
