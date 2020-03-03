<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produit;
use App\Annonce;
use App\Photo;
use App\Reparation;
use DateTime;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class AnnonceController extends Controller
{
    public function show($id)
    {
        $announce = Annonce::findOrFail($id);
        $reparations = Reparation::whereIn('id_produit', [$announce->id_produit])->orderBy('prix', 'asc')->limit(5)->get();
        return view('annonce.product')->with('annonce', $announce)->with('reparations', $reparations);
    }

    public function add()
    {
        $type = DB::table('types')->get();
        return view('annonce.add', ['type' => $type]);
    }

    public function delete($id)
    {
        Annonce::where('id_annonce', $id)->delete();
        return redirect()->route('userProfile', ['id' => Auth::id()]);
    }

    public function send(Request $request)
    {
        // $this->validate($request, array(
        //     'intitule' => 'required|string|max:255',
        //     'nom' => 'required|string|max:255',
        //     'description' => 'required|string|max:255',
        //     'etat' => 'required|string|max:255',
        //     'marque' => 'required|string|max:255',
        //     'annee' => 'nullable|numeric|max:4',
        //     'marque' => 'required|string|max:255',
        //     'pb' => 'nullable|string|max:255',
        //     'type_reparation' => 'nullable|string|max:255',
        //     'type_vente' => 'nullable|string|max:255',
        //     'prix' => 'nullable|numeric|max:255',
        //     'images' => 'required',
        //     'images.*' => 'images|mimes:jpeg,png,jpg|max:2048'
        // ));

        $product = new Produit();
        $now = new DateTime();

        $product->id_type = $request->input('intitule');
        $product->nom = $request->input('nom');
        $product->description = $request->input('description');
        $product->etat = $request->input('etat');
        $product->marque = $request->input('marque');
        $product->annee = $request->input('annee');
        $product->save();

        $announce = new Annonce();

        $announce->id_produit = $product->id_produit;
        $announce->id_utilisateur = Auth::id();
        $announce->date = $now->format('Y-m-d H:i:s');
        $announce->description = $request->input('pb');
        if ($request->has('type_reparation') && $request->has('type_vente')) {
            $announce->type_annonce = 'reparation/vente';
        } else if ($request->has('type_reparation')) {
            $announce->type_annonce = $request->input('type_reparation');
        } else if ($request->has('type_vente')) {
            $announce->type_annonce = $request->input('type_vente');
        }
        $announce->prix = $request->input('prix');

        $announce->save();

        $nb = 0;
        foreach ($request->photos as $file) {
            $photo = new Photo();
            $photo->id_produit = $product->id_produit;
            $extension = $file->getClientOriginalExtension();
            $filename = $nb . $product->nom . $now->format('Y-m-d-H-i-s') . '.' . $extension;
            $nb++;
            $file->move('imgs/annonces/', $filename);
            $photo->url = $filename;
            $photo->save();
        }

        return redirect()->route('home')->with('addAnnonce', 'Annonce ajoutée !');
    }

    public function repair(Request $request, $id)
    {
        $now = new DateTime();
        $annonce = Annonce::find($id);

        if (!$this->checkPrice($annonce->produit->id_produit, $request->input('prix'))) {
            $reparation = new Reparation();
            $reparation->id_utilisateur = Auth::id();
            $reparation->id_produit = $annonce->produit->id_produit;
            $reparation->estvalidee = false;
            $reparation->prix = $request->input('prix');
            $reparation->date = $now->format('Y-m-d-H-i-s');
            $reparation->save();
        }

        return redirect()->route('annonceDetails', ['id' => $id]);
    }

    public function checkPrice($id, $price)
    {
        $reparations = Reparation::where('id_produit', $id)->where('prix', '<=', $price)->count();

        $overPrice = false;
        if($reparations != null) {
            $overPrice = true;
        }
        return $overPrice;
    }

    public function showList()
    {
        $announce = Annonce::whereIn('type_annonce', ['vente', 'on', 'reparation/vente'])->paginate(15);
        $reparation = Annonce::whereIn('type_annonce', ['reparation', 'reparation/vente'])->paginate(15);
        return view('annonce.products')->with('annonce', $announce)->with('reparation', $reparation);
    }
    public function search(Request $request)
    {
        $query = Annonce::join('produits', 'produits.id_produit', '=', 'annonces.id_produit');
        if ($request->get('search') != null) {
            $searchText = $request->input('search');
            $query = $query->where('produits.nom', 'like', '%' . \strtolower($searchText) . '%');
        }
        $announce = $query->whereIn('type_annonce', ['vente', 'reparation/vente'])->paginate(15);
        $reparation = $query->whereIn('type_annonce', ['reparation', 'reparation/vente'])->paginate(15);
        return view('annonce.search')->with('annonce', $announce)->with('reparation', $reparation);
    }
    public function filterAnnonces(Request $request)
    {
        $announce = Annonce::join('produits', 'produits.id_produit', '=', 'annonces.id_produit')->whereIn('type_annonce', ['vente', 'reparation/vente']);
        $reparation = Annonce::join('produits', 'produits.id_produit', '=', 'annonces.id_produit')->whereIn('type_annonce', ['reparation', 'reparation/vente']);
        if ($request->filled('price_from')) {
            $minPrice = $request->get('price_from');
            $announce = $announce->where('annonces.prix', '>=', $minPrice);
        }
        if ($request->filled('price_to')) {
            $maxPrice = $request->get('price_to');
            $announce = $announce->where('annonces.prix', '<=', $maxPrice);
        }
        if ($request->filled('brand')) {
            $announce = $announce->whereIn('produits.marque', $request->get('brand'));
            $reparation = $reparation->whereIn('produits.marque', $request->get('brand'));
        }
        if($request->filled('state')){
            $announce = $announce->whereIn('produits.etat',$request->get('state'));
            $reparation = $reparation->whereIn('produits.etat',$request->get('state'));
        }
        if($request->filled('search')){
            $announce = $announce->where('produits.nom','like','%'.\strtolower($request->get('search')) .'%');
            $reparation = $reparation->where('produits.nom','like','%'.\strtolower($request->get('search')) .'%');
        }
        $announce = $announce->get();
        $reparation = $reparation->get();
        echo \View::make('annonce.listannonces')->with('annonce',$announce)->with('reparation',$reparation);
    }
    
    public function showPropositions($id)
    {
        $annonce = Annonce::find( $id);
        $produit = $annonce->produit; 
        $propositions = Reparation::where('id_produit', $produit->id_produit)->get();
        return view('annonce.propositions')->with('reparations', $propositions)->with('produit', $produit);
    }

    public function validateProposition($id)
    {
        $proposition = Reparation::find($id);

        if($proposition) {
            $proposition->estvalidee = true;
            $proposition->save();
        }

        $others = $proposition->where('estvalidee','!=',1);
        $others->delete();

        return redirect()->route('userProfile', ['id' => Auth::id()]);
    }
}
