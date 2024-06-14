<?php

namespace App\Http\Controllers;

use App\Http\Requests\LookupRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LookupController extends Controller
{
    public function query(LookupRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $result = Cache::remember('query_'.ip2long($validated['ip']), 36000, function () use ($validated) {
            return DB::table('lookup_entries')->useIndex('idx_range')->whereRaw('INET_ATON(?) BETWEEN INET_ATON(range_start) AND INET_ATON(range_end)', [$validated['ip']])->first();
        });

        if (! $result) {
            Log::channel('lookups')->info("[FAIL] Lookup for '{$validated['ip']}'");

            return response()->json(['error' => 'Lookup query failed'], 404);
        }

        $object = [
            'city' => $result->city,
            'region' => $result->region,
            'ip' => $validated['ip'],
            'rangeStart' => $result->range_start,
            'rangeEnd' => $result->range_end,
        ];

        Log::channel('lookups')->info("[SUCCESS] Lookup for '{$validated['ip']}'");

        return response()->json($object);
    }
}
