<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CancerForm extends Model
{
    use HasFactory;

    protected $table = 'cancer_forms';

    protected $fillable = [
        'user_id',
        'title',
        'sex',
        'nationality',
        'age',
        'address_no',
        'subdistrict',
        'district',
        'province',
        'zipcode',
        'diagnosis_methods',
        'icd10',
        'topology',
        'diagnosis_note',
        'laterality',
        'grade',
    ];

    protected $casts = [
        'diagnosis_methods' => 'array', 
        'age' => 'integer',
    ];

    /**
     * 🔗 ความสัมพันธ์กับผู้ใช้งาน (คนที่กรอกแบบฟอร์ม)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function index()
    {
        return CancerForm::where('user_id', Auth::id())->latest()->get();
    }
}
