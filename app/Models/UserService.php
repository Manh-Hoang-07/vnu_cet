<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use HasFactory;
    const FEE_PAID ='paid';
    const FEE_UNPAID ='unpaid';
    const STATUS_COMPLETE ='complete';
    const STATUS_INCOMPLETE ='incomplete';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'user_services','user_id','service_id');
    }
}
