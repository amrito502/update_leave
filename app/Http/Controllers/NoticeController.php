<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('posted_at', 'desc')->get();
        return view('pages.notice.index', compact('notices'));
    }

    public function show($id){
        $notice = Notice::find($id);
        return view('pages.notice.show', compact('notice'));
    }

    public function create()
    {
        return view('pages.notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Notice::create([
            'title' => $request->title,
            'content' => $request->content,
            'posted_at' => now(),
        ]);
        return redirect()->route('notices.index')->with('success', 'Notice posted successfully');
    }


    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $notice->update($request->only(['title', 'content']));
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully');
    }
    public function delete($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully');
    }
}
