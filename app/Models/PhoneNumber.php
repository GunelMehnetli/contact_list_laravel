<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
    ];

    // Bu telefon numarasına ait kişisel bilgi ilişkisini tanımlayın
    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class);
    }
}
