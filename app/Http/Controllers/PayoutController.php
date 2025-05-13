<?php

namespace App\Http\Controllers;

use App\Models\Payout;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'campaign_id' => 'required',
            'country' => 'required',
            'amount' => 'required',
        ]);
        try {
            DB::transaction(function () use ($validated) {
                Payout::create($validated);
            });
            return response()->json(['success' => true], 201);
        } catch (Exception $exception) {
            if ($exception->getCode() == 23000) {
                return response()->json([
                    'success' => false,
                    'message' => 'A payout for this country already exists in this specified campaign.'
                ], 400);
            }
            return response()->json(["success" => false, 'error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $payouts = Payout::where('campaign_id', $id)->get();

        return response()->json(['success' => true, 'payouts' => $payouts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
