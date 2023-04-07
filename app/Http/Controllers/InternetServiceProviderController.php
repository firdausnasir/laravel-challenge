<?php

namespace App\Http\Controllers;

use App\Interfaces\InternetServiceProviderInterface;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    public function getInvoiceAmount(Request $request, InternetServiceProviderInterface $internetServiceProvider)
    {
        $month = $request->input('month', 1);

        $internetServiceProvider->setMonth($month);

        return response()->json([
            'data' => $internetServiceProvider->calculateTotalAmount(),
        ]);
    }
}
