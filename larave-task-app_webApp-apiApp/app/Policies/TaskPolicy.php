<?php
namespace App\Policies;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class TaskPolicy
{
    use HandlesAuthorization;
    public function manage(User $user, Task $task)
    {
        return $user->user_type === 'admin' || $user->id === $task->user_id;
    }
}
