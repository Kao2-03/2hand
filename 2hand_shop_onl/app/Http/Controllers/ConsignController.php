<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Consign;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class ConsignController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $address = Address::where('cus_id', $customer->cus_id)->first();
        $consigns = Consign::where('cus_id', $customer->cus_id)->get();

        return view('consign.create', [
            'user' => $user,
            'customer' => $customer,
            'address' => $address,
            'consigns' => $consigns
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $address = Address::where('cus_id', $customer->cus_id)->first();

        $numbers = [];
        for ($i = 0; $i < 5; $i++) {
            $numbers[] = rand(1, 10);
        }

        $consign_id = $request->input('name') . '_' . implode($numbers);

        $consign = Consign::create([
            'consign_id' => $consign_id,
            'cus_id' => $customer->cus_id,
            'address_id' => $address->address_id,
            'bank_account' => $request->input('bank'),
            'bank_name' => $request->input('number'),
            'cost' => $request->input('price'),
            'who_decide' => $request->input('setter'),
            'info' => $request->input('info'),
            'status' => "pending",
        ]);

        return redirect('/consign');
    }

    public function delete($id)
    {
        // $consign = Consign::where('consign_id', $id)->delete();
        return redirect('/consign');
    }
}
