<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseConfirmationMail;
use App\Mail\ReservationMail;
use App\Models\PurchaseConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PurchaseLinkController extends Controller
{
    public function index($linkID)
    {
        $confirmation = PurchaseConfirmation::where('linkID', $linkID)->firstOrFail();
        return view('purchase.confirmation', compact('confirmation'));
    }
    public function storeSignature(Request $request)
    {
        $request->validate([
            'linkID' => 'required|string',
            'signature_data' => 'required|string',
        ]);

        $confirmation = \App\Models\PurchaseConfirmation::where('linkID', $request->linkID)->firstOrFail();

        $imageData = $request->signature_data;
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signature_' . time() . '.png';
        $imagePath = public_path('img/signature/' . $imageName);
        file_put_contents($imagePath, base64_decode($image));

        $confirmation->sign_path = 'img/signature/' . $imageName;
        $confirmation->save();

        $confirmation = PurchaseConfirmation::find($request->dataID);
        Mail::to($confirmation->email)->send(new ReservationMail($confirmation));

        return redirect()->back()->with('signed', true);
    }

}
