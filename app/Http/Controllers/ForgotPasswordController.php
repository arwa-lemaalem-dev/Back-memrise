<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword as MailResetPassword;
use App\Models\Password_Resets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function searchEmail(Request $request): JsonResponse
    {
        $user = User::where('email', request('email'))->first();
        if ($user) {
            $token = Str::random(60);
            $token_expired = Carbon::now()->addMinutes(
                config('memrise.TOKEN_EXPIRED')
            );
            Password_Resets::where('email', request('email'))->delete();
            Password_Resets::create([
                'email' => request('email'),
                'token' => $token,
                'expired_at' => $token_expired,
            ]);
            Mail::to($user)->send(new MailResetPassword($user, $token));
            return response()->json([
                'message' =>
                    'Nous vous avons envoyé par email le lien de réinitialisation du mot de passe !',
                'status' => 200,
            ]);
        }
        return response()->json([
            'message' =>
                'Aucun utilisateur n\'a été trouvé avec cette adresse email.',
            'status' => 404,
        ]);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update(['password' => bcrypt($request->password)]);
            return response()->json([
                'message' => 'Mot de passe mis à jour ',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'message' => "Erreur du serveur !!!Réessayer s'il vous plaît",
                'status' => 500,
            ]);
        }
        return response()->json([
            'message' => 'Votre jeton a expiré',
            'status' => 404,
        ]);
    }
}
