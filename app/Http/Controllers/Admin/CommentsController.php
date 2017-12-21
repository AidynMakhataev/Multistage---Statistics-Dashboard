<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $comments = Comment::where('author', 'LIKE', "%$keyword%")
                ->orWhere('comment', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $comments = Comment::paginate($perPage);
        }

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Comment::create([
            'project_id' => $requestData['project_id'],
            'views' => $requestData['views'],
            'reposts' => $requestData['reposts'],
            'likes' => $requestData['likes'],
            'link' => $requestData['link'],
            'type' => $requestData['type'],
            'comments' => json_decode($requestData['comments'], true)
        ]);

        return redirect('admin/comments')->with('flash_message', 'Comment added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $comment = Comment::findOrFail($id);
        $comment->update(
            [
            'project_id' => $requestData['project_id'],
            'views' => $requestData['views'],
            'reposts' => $requestData['reposts'],
            'likes' => $requestData['likes'],
            'link' => $requestData['link'],            
            'type' => $requestData['type'],
            'comments' => json_decode($requestData['comments'], true)
            ]
        );

        return redirect('admin/comments')->with('flash_message', 'Comment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect('admin/comments')->with('flash_message', 'Comment deleted!');
    }
}
