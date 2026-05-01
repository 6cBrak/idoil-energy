<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'       => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'sujet'     => 'required|string|max:255',
            'message'   => 'required|string|min:10',
        ], [
            'nom.required'     => 'Le nom est obligatoire.',
            'email.required'   => 'L\'email est obligatoire.',
            'email.email'      => 'L\'email n\'est pas valide.',
            'sujet.required'   => 'Le sujet est obligatoire.',
            'message.required' => 'Le message est obligatoire.',
            'message.min'      => 'Le message doit contenir au moins 10 caractères.',
        ]);

        ContactMessage::create($validated);

        try {
            $dest = config('mail.from.address');
            Mail::raw(
                "Nouveau message de contact — IDOIL ENERGY\n\n" .
                "Nom      : {$validated['nom']}\n" .
                "Email    : {$validated['email']}\n" .
                "Téléphone: " . ($validated['telephone'] ?? '—') . "\n" .
                "Sujet    : {$validated['sujet']}\n\n" .
                "Message :\n{$validated['message']}",
                function ($mail) use ($validated, $dest) {
                    $mail->to($dest)
                         ->replyTo($validated['email'], $validated['nom'])
                         ->subject('Nouveau message : ' . $validated['sujet']);
                }
            );
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email contact : ' . $e->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
    }
}
