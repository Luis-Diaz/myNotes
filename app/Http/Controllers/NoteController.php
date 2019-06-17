<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return User::find(auth()->id())->notes()->get();
    }
    public function store(Request $request)
    {
        $note = new Note();
        $note->content = $request->content;
        $user = User::find(auth()->id());
        $user->notes()->save($note);
        return $note;
    }
    public function update(Request $request, $id)
    {
        $user = User::find(auth()->id());
        $note = $user->notes()->find($id);
        $note->content = $request->content;
        $note->save();
        return $note;
    }
    public function destroy($id)
    {
        $user = User::find(auth()->id());
        $note = $user->notes()->find($id);
        $note->delete();
    }
}
