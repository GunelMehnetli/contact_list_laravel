<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'office_number',
        'full_name',
        'email',
        'faks'
    ];

    // Bu kişisel bilgiye ait telefon numaraları ilişkisini tanımlayın
    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }
}
