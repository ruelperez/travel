<?php

namespace App\Http\Controllers;

use App\Models\PurchaseConfirmation;
use Illuminate\Http\Request;

class PurchaseLinkController extends Controller
{
    public function index($link_id)
    {
        $confirmation = PurchaseConfirmation::where('link_id', $link_id)->firstOrFail();
        return view('purchase.confirmation', compact('confirmation'));
    }
    public function storeSignature(Request $request)
    {
        $request->validate([
            'link_id' => 'required|string',
            'signature_data' => 'required|string',
        ]);

        $confirmation = \App\Models\PurchaseConfirmation::where('link_id', $request->link_id)->firstOrFail();

        $imageData = $request->signature_data;
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signature_' . time() . '.png';
        $imagePath = public_path('img/signature/' . $imageName);
        file_put_contents($imagePath, base64_decode($image));

        $confirmation->sign_path = 'img/signature/' . $imageName;
        $confirmation->save();

        return redirect()->back()->with('success', 'Your signature has been saved successfully.');
    }

}
