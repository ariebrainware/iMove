<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sender;
use App\Models\Item;
use App\Models\Recipient;

class Transaction extends Model
{
    protected $table = 'transaction';
    public $incrementing = false;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function senders()
    {
        return $this->belongsTo('App\Models\Sender', 'sender', 'id');
    }

    public function items()
    {
        return $this->belongsTo('App\Models\Item', 'item', 'id');
    }
    public function recipients()
    {
        return $this->belongsTo('App\Models\Recipient', 'recipient', 'id');
    }
}
