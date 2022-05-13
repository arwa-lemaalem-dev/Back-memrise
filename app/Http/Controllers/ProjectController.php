<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function list():JsonResponse
    {
        $liste=Projects::all();
        if($liste)
        {
            return response()->json([
                'status' => 200,
                'projects' =>$liste,
            ]);
        }
    }

    public function create(Request $request):JsonResponse
    {
        $name = '/projects/' . $request->name_project.'-'.uniqid() . '.' . "jpg";

        $project=Projects::create([
            'name_project'=>$request->name_project,
            'deadline'=>$request->deadline,
            'url'=>$request->url,
            'user_id'=>Auth::id(),
            'logo'=>$name,
           'status'=>'Créé'
        ]);
        if($project)
        {
            $logo = $request->file('logo');
            $logo->storePubliclyAs('public', $name);
            return response()->json([
                'status'=>201,
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
