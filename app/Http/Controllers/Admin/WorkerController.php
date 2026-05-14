<?php

namespace App\Http\Controllers\Admin;

use App\Models\Worker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\WorkerWork;

class WorkerController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Admin/Workers/Index', [
            'workers' => Worker::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Workers/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'experience' => 'required|integer',
            'description' => 'nullable',
            'photo' => 'nullable|image|max:2048'
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('workers', 'public');
        }

        Worker::create([
            'name' => $request->name,
            'position' => $request->position,
            'experience' => $request->experience,
            'description' => $request->description,
            'photo' => $photoPath
                ? '/storage/' . $photoPath
                : null
        ]);

        return redirect('/admin/workers');
    }
    public function show(Worker $worker)
    {
        $worker->load('works');

        return Inertia::render(
            'Admin/Workers/Show',
            [
                'worker' => $worker
            ]
        );
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();

        return back();
    }
    public function storeWork(
    Request $request,
    Worker $worker
)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'work_image' => 'nullable|image'
    ]);

    $image = null;

    if ($request->hasFile('image')) {

        $path = $request->file('image')
            ->store('works', 'public');

        $image = '/storage/' . $path;
    }

    $worker->works()->create([
        'title' => $request->title,
        'description' => $request->description,
        'work_image' => $image
    ]);

    return back();
}
public function destroyWork(WorkerWork $work)
{
    $work->delete();

    return back();
}
}
