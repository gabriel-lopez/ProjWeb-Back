<?php

namespace App\Http\Controllers;

use App\Junior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class JuniorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-liste-juniors'))
            {
                return response()
                    ->json(User::with(
                        'junior',
                        'adresse_habitation',
                        'junior.adresse_de_depart',
                        'junior.adresse_de_facturation',
                        'junior.matieres')
                        ->has('junior')
                        ->get(), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        return response()
            ->json(User::with(
                'junior',
                'adresse_habitation',
                'junior.adresse_de_depart',
                'junior.adresse_de_facturation',
                'junior.matieres')
                ->has('junior')
                ->find($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Junior $junior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public function destroy(Junior $junior)
    {
        //
    }

    public static function get($id)
    {
        return User::with(
            'junior',
            'adresse_habitation',
            'junior.adresse_de_depart',
            'junior.adresse_de_facturation')
            ->has('junior')
            ->find($id);
    }
}
