<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedbackController extends Controller
{
    // форма 1
    public function create()
    {
        return Inertia::render('Feedback/Create');
    }

    // переход к комментарию
    public function step(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'agree' => 'accepted'
        ]);

        session([
            'feedback_data' => [
                'name' => $request->name,
                'phone' => $request->phone,
                'agree' => $request->agree
            ]
        ]);

        return redirect('/feedback/comment');
    }

    // страница комментария
    public function comment()
    {
        return Inertia::render('Feedback/Comment');
    }

    // сохранение
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $data = session('feedback_data');

        Feedback::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'agree' => $data['agree'],
            'comment' => $request->comment
        ]);

        session()->forget('feedback_data');

        return redirect('/')
            ->with('success', 'Заявка отправлена');
    }
}
