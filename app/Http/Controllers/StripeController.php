<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function pay($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        return view('payment.pay', compact('product'));
    }

    public function paystripe($id)
    {
        $user = Auth::user();
        $product = Product::where('id', $id)->firstOrFail();

        try {
            $intent = $product->createSetupIntent();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $product->stripe_id = null;
            $product->save();
            return redirect()->route('paystripe', ['id' => $id]);
        }

        $stripeKey = config('services.stripe.key');
        $clientSecret = $intent ? $intent->client_secret : null;

        return view('payment.stripe', [
            'intent' => $intent,
            'clientSecret' => $clientSecret,
            'stripeKey' => $stripeKey,
            'id' => $id,
        ]);
    }

    public function paystripestore(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::where('id', $id)->firstOrFail();
        $amount = $product->price * 100;
        $currency = $product->currency;
        $paymentMethod = $request->payment_method;

        $product->createOrGetStripeCustomer();
        $paymentMethod = $product->addPaymentMethod($paymentMethod);

        $charge = $product->charge($amount, $paymentMethod->id, [
            'currency' => $currency,
            'return_url' => route('paystripe', ['id' => $id]), // Add this line
        ]);

        $product->update([
            // 'status' => 'PAID',
            'order_no' => $charge->id,
        ]);
        return redirect()->route('paystripe', ['id' => $id])->with('message', 'Payment Successfully Done.');
    }
}
