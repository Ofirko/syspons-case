<?php

namespace App\Models;

use Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $guarded = [];
    // keeping my different attempts commented out:

    // protected $table = 'email_log';
    // Log::'email_log';
}