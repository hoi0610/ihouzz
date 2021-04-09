<?php
namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class UsersRepository extends BaseRepository implements UsersRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

}
