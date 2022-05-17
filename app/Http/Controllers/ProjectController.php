<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function list(): JsonResponse
    {
        $liste = Projects::with('task')->get();
        foreach ($liste as $project) {
            if ($project->task) {
                $project->update([
                    'status' => "en cours"
                ]);
            }
        }
        if ($liste) {
            return response()->json([
                'status' => 200,
                'projects' => $liste,
            ]);
        }
    }

    public function create(Request $request): JsonResponse
    {
        if ($request->file('logo')) {
            $name = '/projects/' . $request->name_project . '-' . uniqid() . '.' . "jpg";
        } else {
            $name = "/projects/logo_site.png";
        }
        $project = Projects::create([
            'name_project' => $request->name_project,
            'deadline' => $request->deadline,
            'url' => $request->url,
            'user_id' => Auth::id(),
            'logo' => $name,
            'status' => 'Créé'
        ]);
        if ($project) {
            if ($request->file('logo')) {
                $logo = $request->file('logo');
                $logo->storePubliclyAs('public', $name);
            }
            return response()->json([
                'status' => 201,
                'response' => 'Projet créé avec succès',
                'user_id' => Auth::id()

            ]);
        }
        return response()->json([
            'status' => 500,
            'response' => "Erreur du serveur !!!Réessayer s'il vous plaît",
        ]);
    }

    public function delete(Request $request):JsonResponse
    {
        $project=Projects::where('id',$request->project_id)->first();
        if($project)
        {
            $del=$project->delete();
            if($del)
            {
                return response()->json([
                    'status' => 200,
                    'response' => "Suppression terminée avec succés",
                ]);
            }
        }
        return response()->json([
            'status' => 404,
            'response' => "Erreur du serveur !!!Réessayer s'il vous plaît",
        ]);
    }
}
