<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;

class Ticket extends Model
{
    protected $fillable = ['title', 'description', 'status_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
