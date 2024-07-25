<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Districts;
use App\Models\Invoice;
use App\Models\invoice_detail;
use App\Models\Provinces;
use App\Models\Wards;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;
        $user_create_unformat = Auth::user()->created_at;
        $user_create = Carbon::parse($user_create_unformat)->format('Y-m-d');
        $customer = customer::where('user_id', $user->id)->first();
        $year = Carbon::parse($customer->birth)->year;
        $month = Carbon::parse($customer->birth)->month;
        $day = Carbon::parse($customer->birth)->day;

        return view('user.info', [
            'user_create' => $user_create,
            'user' => $user,
            'customer' => $customer,
            'year' => "$year",
            'month' => $month,
            'day' => $day
        ]);
    }

    public function indexAddress()
    {
        $user = Auth::user();
        $user_create = Carbon::parse(Auth::user()->created_at)->format('Y-m-d');
        $customer = Customer::where('user_id', $user->id)->first();
        $addresses = Address::where('cus_id', $customer->cus_id)->get();

        foreach ($addresses as $address) {
            $province = Provinces::where('code', $address->province_code)->first();
            $address->province = $province;

            $district = Districts::where('code', $address->district_code)->first();
            $address->district = $district;

            $ward = Wards::where('code', $address->ward_code)->first();
            $address->ward = $ward;
        }
        
        return view('user.address', [
            'addresses' => $addresses,
            'user' => $user,
            'user_create' => $user_create
        ]);
    }

    public function addAddress()
    {
        $provinces = Provinces::all();
        $districts = Districts::all();
        $wards = Wards::all();
        $user = Auth::user();
        $user_create = Carbon::parse(Auth::user()->created_at)->format('Y-m-d');
        return view('user.add-address', [
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
            'user' => $user,
            'user_create' => $user_create,
        ]);
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required|string',
            'address_detail' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ]);

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        $address = Address::create([
            'cus_id' => $customer->cus_id,
            'province_code' => $request->input('province'),
            'district_code' => $request->input('district'),
            'ward_code' => $request->input('ward'),
            'address_detail' => $request->input('address_detail'),
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'email' => "",
        ]);

        return redirect('/user/address');
    }

    public function editAddress(string $id)
    {
        $address = Address::where('address_id', $id)->first();
        $provinces = Provinces::all();
        $districts = Districts::all();
        $wards = Wards::all();
        $user = Auth::user();
        $user_create = Carbon::parse(Auth::user()->created_at)->format('Y-m-d');
        return view('user.edit-address', [
            'address' => $address,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
            'user' => $user,
            'user_create' => $user_create,
        ]);
    }

    public function updateAddress(Request $request, string $id)
    {
        $address = Address::where('address_id', $id)->update([
            'province_code' => $request->input('province'),
            'district_code' => $request->input('district'),
            'ward_code' => $request->input('ward'),
            'address_detail' => $request->input('address_detail'),
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
        ]);

        return redirect('/user/address');
    }

    public function deleteAddress(string $id)
    {
        $address = Address::where('address_id', $id)->delete();
        return redirect()->route('user.address.index');
    }

    public function indexPurch()
    {
        $user_name = Auth::user()->name;
        $user_create_unformat = Auth::user()->created_at;
        $user_create = Carbon::parse($user_create_unformat)->format('Y-m-d');
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $orders = DB::table('invoices')
            ->select(
                'invoices.invoice_id',
                'clothes.cloth_name',
                'invoices.total_value',
                'cloth_imgs.img',
                'clothes.cost',
                'invoice_detail.quantity',
                'invoices.status',
                'list_clothes.size_id',
                'invoices.is_pay',
            )
            ->leftJoin('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoices.invoice_id')
            ->leftJoin('clothes', 'clothes.cloth_id', '=', 'invoice_detail.cloth_id')
            ->leftJoin('cloth_imgs', 'cloth_imgs.cloth_id', '=', 'clothes.cloth_id')
            ->leftJoin('list_clothes', 'list_clothes.cloth_id', '=', 'clothes.cloth_id')
            ->join('customers', 'customers.cus_id', '=', 'invoices.cus_id')
            ->where('customers.user_id', $user_id)
            ->orderByDesc('invoices.created_on') 
            ->get();
        $customer = customer::where('user_id', $user->id)->first();
        $ordersGrouped = $orders->groupBy('invoice_id');
        // dd($ordersGrouped);
        return view('user.purchase', ['user_name' => $user_name, 'user_create' => $user_create, 'ordersGrouped' => $ordersGrouped, 'customer' => $customer, 'user' => $user]);
    }

    public function editUser(string $id)
    {
        $user = Auth::user();
        // dd($cloth);
        $user_create = Carbon::parse($user->created_at)->format('Y-m-d');
        $customer = customer::where('user_id', $user->id)->first();
        if ($customer->birth) {
            $year = Carbon::parse($customer->birth)->year;
            $month = Carbon::parse($customer->birth)->month;
            $day = Carbon::parse($customer->birth)->day;
        }

        return view('user.edit', [
            'user' => $user, 'user_create' => $user_create, 'customer' => $customer, 'year' => $year, 'month' => $month, 'day' => $day
        ]);
    }
    public function updateUser(Request $request, string $id)
    {
        $user = Auth::user();

        // Validate and parse the date components if available
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');

        $date = null;

        // Check if all date components are present
        if ($year && $month && $day) {
            try {
                $date = Carbon::createFromDate($year, $month, $day)->toDateString();
            } catch (Exception $e) {
                // Handle the exception (invalid date format)
            }
        }

        // Update user information
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Update customer information
        DB::table('customers')->where('user_id', $user->id)->update([
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'birth' => $date,
        ]);

        return redirect()->route('user.info');
    }

    public function appUser()
    {
        // Logic cho app-user.blade.php
        return view('layouts.app-user');
    }
}
