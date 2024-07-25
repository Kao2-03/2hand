<?php

namespace App\Http\Controllers;

use App\Models\Consign;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminConsignController extends Controller
{
    public function index()
    {
        $consigns = Consign::all();
        $consigns_count = Consign::count();
        foreach ($consigns as $consign) {
            $consign->customer = Customer::where('cus_id', $consign->cus_id)->first();
            $consign->user = User::where('id', $consign->customer->cus_id)->first();
        }
        return view('admin.consign.index', [
            'consigns' => $consigns,
            'consigns_count' => $consigns_count
        ]);
    }

    public function show(string $id)
    {
        $consign = Consign::where('consign_id', $id)->first();
        $customer = Customer::where('cus_id', $consign->cus_id)->first();
        $user = User::where('id', $customer->cus_id)->first();

        return view('admin.consign.show', [
            'consign' => $consign,
            'customer' => $customer,
            'user' => $user
        ]);
    }

    public function update(string $id)
    {
        $consign = Consign::where('consign_id', $id);

        if ($consign->first()->status == 'pending') {
            $consign->update([
                'status' => 'confirm'
            ]);
        }

        return redirect('/admin/consign');
    }

    public function delete(string $id)
    {
        $consign = Consign::where('consign_id', $id)->delete();
        return redirect('/admin/consign');
    }
}
