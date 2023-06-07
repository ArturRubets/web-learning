<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * A variable that defines the default sort field.
     * Value: 'created_at' - creation date field.
     *
     * @var string
     */
    private $sortBy = 'created_at';

    /**
     * A variable that specifies the default sort direction.
     * Value: 'desc' - in descending order.
     *
     * @var string
     */
    private $sortOrder = 'desc';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = $this->getCommentsWithReplies();

        return view('welcome', ['comments' => $comments, 'sortBy' => $this->sortBy, 'sortOrder' => $this->sortOrder]);
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
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        // Save the comment
        Comment::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'home_page' => $request->home_page,
            'captcha' => $request->captcha,
            'text' => $request->text,
            'parent_id' => $request->parent_id,
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

    public function getCommentsWithReplies($sortBy = 'created_at', $sortOrder = 'desc')
    {
        return Comment::whereNull('parent_id')
            ->orderBy($sortBy, $sortOrder)
            ->with('replies')
            ->paginate(25);
    }

    public function sort(Request $request)
    {
        $sortBy = $request->query('sortBy', 'created_at');
        $sortOrder = $request->query('order', 'desc');

        $validSorts = ['user_name', 'email', 'created_at']; // Valid sorting options

        if (!in_array($sortBy, $validSorts)) {
            // Handling an invalid sort option
            return redirect()->route('error')->with('message', 'Недійсний варіант сортування');
        }

        // Перевірка значення sortOrder
        if ($sortOrder !== 'asc' && $sortOrder !== 'desc') {
            // Handling invalid sort direction
            return redirect()->route('error')->with('message', 'Недійсний напрямок сортування');
        }

        // Updating the values of the sortBy and sortOrder variables
        $this->sortBy = $sortBy;
        $this->sortOrder = $sortOrder;

        // Executing sorting logic and getting comments
        $comments = $this->getCommentsWithReplies($this->sortBy, $this->sortOrder);

        return view('welcome', ['comments' => $comments, 'sortBy' => $this->sortBy, 'sortOrder' => $this->sortOrder]);
    }
}
