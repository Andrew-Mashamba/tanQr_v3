<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Merchant;
use App\Models\Isos;
class TransactionApiController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data as needed

        $incomingTransaction = $request->all();

        // Lookup additional data from the merchants table
        $merchantData = Merchant::where('merchant_id', $incomingTransaction['merchant_id'])->first();

        if ($merchantData) {
            // Lookup ISO details
            $isoDetails = Isos::find($merchantData->iso_id);

            // Combine incoming data with data from merchants and ISO tables
            $transactionData = array_merge(
                $incomingTransaction,
                [
                    "rrn" => $this->generateSecureReferenceNumber(),
                    "merchant_name" => $merchantData->merchant_name,
                    "business_name" => $merchantData->business_name,
                    "merchant_account" => $merchantData->TZS_account,
                    "merchant_location" => $merchantData->merchant_city,
                    "merchant_system_id" => $merchantData->id,
                ],
                [
                "iso_name" => $isoDetails->name,
                "iso_id" =>  $isoDetails->id,
                ]
            );

            // Save the transaction to the database
            Transaction::create($transactionData);

            // You can return a response, emit an event, or perform other actions as needed

            return response()->json(['message' => 'Transaction saved successfully'], 200);
        }

        return response()->json(['error' => 'Merchant not found'], 404);
    }

    function generateSecureReferenceNumber($length = 12): string
    {
        // Use a combination of random bytes and timestamp
        $randomBytes = random_bytes(ceil($length / 2));
        $timestamp = microtime(true) * 10000; // Multiply by 10000 to get milliseconds

        // Combine random bytes and timestamp
        $rawReference = bin2hex($randomBytes) . $timestamp;

        // Shuffle the characters to make it less predictable
        $shuffledReference = str_shuffle($rawReference);

        // Take only the desired length
        $secureReference = substr($shuffledReference, 0, $length);

        return $secureReference;
    }
}
