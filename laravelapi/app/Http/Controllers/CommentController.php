<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $comments = Comment::all();
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create([
            'text'=>$request->text,
            'user_id'=>$request->user_id,
            'post_id'=>$request->post_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return DB::table('comments')->where('post_id','like',$id)->join('users','comments.user_id',"=",'users.id')->get();
    //    return DB::table('users')->join('comments','comments_id','=','users.id')->where('post_id','like',$id)->get();
    }
// 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function join(Request $request)
    {
        $postInfo= DB::table('users')
        ->join('comments', 'users.id', '=', 'comments.user_id')->get();
        return $postInfo;
    }

    public function Comments()
    {
        $comments = Comment::all();
        return $comments;
    }


    public function destroy($comment)
    {
        $app = Comment::find($comment);
        $app->delete();
        return redirect()->back()->with('success', 'Comment has been ignored');
    }
    public function dell($id)
    {
        return Comment::where('commentId','=',$id)->delete();
    }
}
