<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperMessage
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'from_id',
        'to_id',
        'read_at'
    ];
    public function user( )
    {
        return $this->belongsTo(User::class ,'from_id');

    }
}
