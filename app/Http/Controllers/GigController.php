<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class GigController extends Controller
{
    public function index(Gig $gig)
    {
        $gigs = $gig->latest()->paginate(5);
        return view('index', ['gigs' => $gigs]);
    }

    public function show(Gig $gig)
    {
        return view('gig.index', ['gigs' => $gig]);
    }

    public function create()
    {
        return view('gig.create');
    }

    public function store(Gig $gig, Request $request)
    {

        $data = $request->validate([
            'title' => 'required|min:3',
            'tags' => 'required|min:3',
            'company' => 'required|min:3',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'description' => 'required',
        ]);

        $data['user_id'] = auth()->id();
        // dd($data);
        // $data['user_id'] = Auth::id();

        $gig->create($data);
        return redirect()->route('index');
    }

    public function edit(Gig $gig)
    {
        if ($gig->user_id == auth()->id()) {
            return view('gig.update', ['gig' => $gig]);
        } else {
            abort(403);
        }
    }

    public function update(Gig $gig, Request $request)
    {

        // Add validation
        $gig->title = $request->title;
        $gig->tags = $request->tags;
        $gig->company = $request->company;
        $gig->location = $request->location;
        $gig->email = $request->email;
        $gig->website = $request->website;
        $gig->description = $request->description;


        $gig->save();
        return redirect("/gigs/" . $gig->id);
    }

    public function delete(Gig $gig)
    {
        if ($gig->user_id == auth()->id()) {
            $gig->delete();
            return redirect()->route('index');
        } else {
            abort(403);
        }
    }

    public function search(Gig $gig, Request $request)
    {
        $data = $gig->latest()->where('title', 'like', '%' . $request->search . '%')
            ->orWhere('tags', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->paginate(5)->withQueryString();
        return view('index', ['gigs' => $data]);
    }
}
