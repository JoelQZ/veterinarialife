<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Appointment extends Model{
    protected $fillable = [
        'pet',
        'owner',
        'date',
        'reason'
    ];
    public $timestamps = false;
}