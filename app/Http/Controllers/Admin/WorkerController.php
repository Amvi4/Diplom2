<?php

namespace App\Http\Controllers\Admin;

use App\Models\Worker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\WorkerWork;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

    $uploadedFile = Cloudinary::upload(
        $request->file('photo')->getRealPath(),
        [
            'folder' => 'workers'
        ]
    );

    $photoPath = $uploadedFile->getSecurePath();
}

        Worker::create([
            'name' => $request->name,
            'position' => $request->position,
            'experience' => $request->experience,
            'description' => $request->description,
            'photo' => $photoPath
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

    if ($request->hasFile('work_image')) {

    $uploadedFile = Cloudinary::upload(
        $request->file('work_image')->getRealPath(),
        [
            'folder' => 'works'
        ]
    );

    $image = $uploadedFile->getSecurePath();
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
