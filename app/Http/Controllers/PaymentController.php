<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('site.chackout');
    }

    public function processPayment(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'stripeToken' => 'required',
        ]);

        // Configurer la clé API de Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Créer la charge Stripe avec les informations de l'utilisateur
            $charge = Charge::create([
                'amount' => $request->amount * 100, // Le montant doit être en centimes
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Paiement pour ' . $request->name . ' ' . $request->prenom,
                'receipt_email' => $request->email, // Envoie un reçu à l'adresse e-mail de l'utilisateur
                'metadata' => [
                    'nom' => $request->name,
                    'prenom' => $request->prenom,
                ],
            ]);

            // Stocker les informations de la charge dans la session
            session()->put('charge', $charge);

            // Rediriger vers la page de confirmation
            return redirect()->route('payment.confirmation');
        } catch (\Exception $e) {
            // Gestion des erreurs lors du paiement
            return back()->with('error', 'Erreur lors du paiement : ' . $e->getMessage());
        }
    }

    public function showConfirmation()
    {
        // Récupérer les données du paiement de la session
        $charge = session('charge');

        

        // Afficher la page de confirmation avec les données de la transaction
        return view('site.confirmation', compact('charge'));
    }
}
