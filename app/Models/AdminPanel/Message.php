<?php

namespace App\Models\AdminPanel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Message extends Model
{
    use HasFactory;

    public $table = 'messages';
    protected $fillable = ['id', 'sender_id','receiver_id', 'text'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTimeAttribute(): string {
        return date(
            "d M Y, H:i:s",
            strtotime($this->attributes['created_at'])
        );
    }
}
