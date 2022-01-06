<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicinePersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user',
        'client',
        'client_type',
        'date',
        'duration',
        'type_of_call',
        'external_call_score'
    ];

    protected $table = 'medicine_personal';

    public static function insertData($insertData)
    {
        $value = DB::table('medicine_personal')->where('id')->get();
        if ($value->count() == 0) {
            DB::table('medicine_personal')->insert($insertData);
        }
    }
}
