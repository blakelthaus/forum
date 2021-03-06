<?php

namespace App\Filters;

use App\Filters\Filters;
use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popular'];
    /**
     * @param $builder
     * @param $username
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    public function popular()
    {
        $this->builder->getQuery()->orders = [];
        $this->builder->orderBy('replies_count', 'desc');
    }
}
