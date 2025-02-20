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

            $annonce->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orwhere('description', 'like', '%' . $request->search . '%');

            });


        }

        $countAnnonce = Annonce::count('id_annonce');
        $views = Annonce::orderBy('title', 'desc')
            ->take(5)
            ->get();

        $annonce = $annonce->paginate(6)->appends($request->except('page'));
        return view('dashboard', compact('annonce', 'countAnnonce'));

    }

    public function form()
    {
        return view('annonce');
    }

    public function create()
    {
        session()->flash('status', 'Post ajouté avec succès');
        return redirect('dashboard');

    }
    public function store(Request $request)
    {
   
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_event' => 'required|date|date_format:Y-m-d',
            'user_id' => 'required',
            'category'=>'required',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');

        Annonce::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'type' => $request->type,
            'image' => $imagePath,
            'date_of_event' => $request->date_of_event,
            'category_id'=>$request->category,
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->route('annonce.create')->with('success', 'Post ajouté avec succès');
    }
    public function getDetaile($id)
    {
        session(['previous_url' => url()->current()]);
        $annonce = DB::table('annonce')
            ->join('users', 'annonce.user_id', '=', 'users.id')
            ->leftJoin('comments as s', 'annonce.id_annonce', '=', 's.announcement_id')
            ->select('users.*', 'annonce.*', 's.*')
            ->where('annonce.id_annonce', '=', $id)
            ->get();

        $annonce = Annonce::with(['users', 'comments'])->findOrFail($id);

        if (!$annonce) {
            return redirect()->route('dashboard')->with('error', 'Annonce not found');
        }

        $annonce->posted_ago = Carbon::parse($annonce->date_of_event)->diffForHumans();

        return view('detaile', compact('annonce'));

    }
    public function show()
    {
        return view('detaile');
    }
    public function MesAnnonce()
    {
        session(['previous_url2' => url()->current()]);
        $annonce = Annonce::with(['users', 'comments'])
            ->where('user_id', Auth::id())
            ->get();

        return view('mes_annonce', compact('annonce'));
    }
    public function delete($id)
    {
        Annonce::find($id)->delete();
        return redirect()->back();
    }
    public function editeAnnonce($id)
    {
        $annonces = Annonce::find($id);
        return view('annonce', compact('annonces'));
    }

    public function update(request $request, $id)
    {
        $annonces = Annonce::find($id);
        $annonces->title = $request->input('title');
        $annonces->description = $request->input('description');
        $annonces->location = $request->input('location');
        $annonces->type = $request->input('type');
        $annonces->category_id = $request->input('category');
        $annonces->date_of_event = $request->input('date_of_event');

        $imagePath = $request->file('image')->store('images', 'public');
        $annonces->image = $imagePath;
        $annonces->save();
        return redirect(session('previous_url2'));

    }
}
