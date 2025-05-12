<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Payout;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $campaigns = Campaign::all();
        return response()->json($campaigns, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        try {
            DB::transaction(function () use($validated) {
                Campaign::create($validated);
            });

            return response()->json(["success" => true], 201);

        } catch (Exception $e) {
            Log::error('Transaction failed: ' . $e->getMessage());

            return response()->json(["success" => false], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
