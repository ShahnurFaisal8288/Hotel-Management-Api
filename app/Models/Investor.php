<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Investor extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public static function boot()
    // {
    //     parent::boot();

    //     self::creating(function ($model) {
    //         // Set the serial number starting from 2500
    //         $model->serial_number = self::generateSerialNumber();
    //     });
    // }

    // private static function generateSerialNumber()
    // {
    //     $prefix = 'CRP';
    //     $lastGeneratedSerial = self::where('serial_number', 'like', $prefix . '%')->latest('created_at')->value('serial_number');

    //     if (!$lastGeneratedSerial) {
    //         // If no previous serial number is found, start from 'CS2500'
    //         return $prefix . '2501';
    //     }

    //     // Extract the numeric part and increment
    //     $nextSerialNumber = $prefix . (intval(substr($lastGeneratedSerial, strlen($prefix))) + 1);

    //     return $nextSerialNumber;
    // }


    // public function employees()
    // {
    //     return $this->belongsToMany(Employee::class, 'employee_investor', 'investor_id', 'employee_id');
    // }
    // public function teamLeaders()
    // {
    //     return $this->belongsToMany(TeamLeader::class, 'team_leader_investor', 'investor_id', 'team_leader_id');
    // }
}
