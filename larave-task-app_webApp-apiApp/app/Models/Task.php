<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];

    // /* Get the user that owns the task. */
    // public function user() // add this
    // {
    //     return $this->belongsTo(User::class);
    // }
}
