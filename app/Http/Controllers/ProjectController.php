<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function list()
    {
        $liste=Projects::all();
        if($liste)
        {
            // return response()->json([
            //     'etat' =>'Welcome' .' ' .ucfirst($user->name) .' in your Application ( ' .ucfirst($user->work_space) .' )',
            //     'status' => 200,
            //     'token' => $token,
            //     'user' => $user,
            // ]);
        }
    }

    public function create(Request $request):JsonResponse
    {
        $project=Projects::create([
            'name_project'=>request('name_project'),
            'deadline'=>request('deadline'),
            'user_id'=>Auth::id()
        ]);
        if($project)
        {
            return response()->json([
                'status'=>200,
                'response'=>'Projet créé avec succès',
                'user_id'=>Auth::id()

            ]);
        }
        return response()->json([
            'status'=>500,
            'response'=>"Erreur du serveur !!!Réessayer s'il vous plaît",
        ]);
    }
}
