<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CawRefController extends Controller
{
    public function fetch($type)
    {
        $baseUrl = 'https://canceranywhere.com/caw-gateway-production/ref/';

        $allowed = [
            'area',              // รหัสที่อยู่
            'beh',               // Behavior
            'death_cause',       // สาเหตุการเสียชีวิต
            'diag',              // วิธีการวินิจฉัย
            'finance_support',   // สิทธิการรักษา
            'icd10',             // รหัสโรค
            'topo',              // Topology
            'sex',               // เพศ
            'title',             // คำนำหน้า
            'treatment',         // วิธีการรักษา
            'nationality',       // สัญชาติ
        ];

        if (!in_array($type, $allowed)) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        $res = Http::get($baseUrl . $type);

        if (!$res->successful()) {
            return response()->json(['error' => 'Failed to fetch from CAW'], 500);
        }

        return response()->json($res->json());
    }
}
