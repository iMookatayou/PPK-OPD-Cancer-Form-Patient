<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CancerForm;
use Illuminate\Support\Facades\Auth;

class CancerFormController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:50',
            'sex' => 'required|string|max:10',
            'nationality' => 'nullable|string|max:50',
            'age' => 'nullable|integer',
            'address_no' => 'nullable|string|max:100',
            'subdistrict' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'zipcode' => 'nullable|string|max:10',
            'diagnosis_methods' => 'nullable|array',
            'icd10' => 'nullable|string|max:20',
            'topology' => 'nullable|string|max:50', 
            'diagnosis_note' => 'nullable|string|max:1000',
            'laterality' => 'nullable|string|max:20',
            'grade' => 'nullable|string|max:20',
        ]);

        $data['diagnosis_methods'] = json_encode($data['diagnosis_methods'] ?? []);
        $data['user_id'] = Auth::id();

        $form = CancerForm::create($data);

        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'id' => $form->id,
        ], 201);
    }
}
