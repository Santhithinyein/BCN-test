<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

use function Laravel\Prompts\search;

class VoucherController extends Controller
{
    public function upload(Request $request)
    {
       
        // Store the uploaded image
        $imagePath = '/storage/'.$request->file('voucher')->store('vouchers', 'public');
       
        // Save the image path to the database
        $voucher = new Voucher();
        $voucher->user_id = auth()->id(); // Assuming you are using authentication
        $voucher->image_path = $imagePath;
        $voucher->save();

        return redirect()->back()->with('success', 'Voucher uploaded successfully.');
    }

    public function index()
    {
           
        $filter =request(['id']);
        $vouchers = Voucher::orderBy('id', 'desc')
                    ->with('user')
                    ->search($filter)
                    ->latest()->paginate(5);
                   
        return view('admin.voucher.index',[
            'vouchers' => $vouchers
        ]);
       

    }
   
}
