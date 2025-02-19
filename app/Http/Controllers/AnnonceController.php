<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnonceController extends Controller
{
    public function index(request $request)
    {
        $annonce = Annonce::query();

        if ($request->has('search')) {

            $annonce->where( function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orwhere('description', 'like', '%' . $request->search . '%');

            });
                
                
        }
        $annonce = $annonce->paginate(6)->appends($request->except('page'));
        return view('dashboard', compact('annonce'));

    }

    public function form()
    {
        return view('annonce');
    }
    // public function Detaile()
    // {
    //     return view('detaile');
    // }
    public function create()
    {

        return redirect('dashboard');

    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_event' => 'required|date|date_format:Y-m-d',
            'user_id' => 'required',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Annonce::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'type' => $request->type,
            'category' => $request->category,
            'image' => $imagePath,
            'date_of_event' => $request->date_of_event,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('annonce.create')->with('success', 'Post ajouté avec succès');
    }
    public function getDetaile($id)
    {
        session(['previous_url'=>url()->current()]);
        $annonce = DB::table('annonce')
        ->join('users', 'annonce.user_id', '=', 'users.id') 
        ->leftJoin('comments as s', 'annonce.id_annonce', '=', 's.announcement_id')
        ->select('users.*', 'annonce.*', 's.*') 
        ->where('annonce.id_annonce', '=', $id)
        ->get();

        $annonce = Annonce::with(['users','comments'])->findOrFail($id);

        if (!$annonce) {
            return redirect()->route('dashboard')->with('error', 'Annonce not found');
        }

        $annonce->posted_ago = Carbon::parse($annonce->date_of_event)->diffForHumans();

        return view('detaile', compact('annonce'));

    }
    public function show(){
        return view('detaile');
    }
}
