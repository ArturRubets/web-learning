<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|alpha_num',
            'email' => 'required|email',
            'home_page' => 'nullable|url',
            'captcha' => 'required|captcha',
            'text' => 'required|not_regex:/<[^>]*>/',
        ]);

        // Save the comment
        Comment::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'home_page' => $request->home_page,
            'captcha' => $request->captcha,
            'text' => $request->text,
        ]);

        return response()->json(['redirect' => '', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }
}
