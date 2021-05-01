<?php


namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id',$user->id); 
        // Collection method for the likes Collection
    }

    // public function ownedBy(User $user)
    // {
    //     return $user->id  === $this->user_id;
    // }
    // // removed from index.blade.php @if ($post->ownedBy(auth()->user())) ...@endif

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
