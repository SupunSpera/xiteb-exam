<?php

namespace domain\Services\Users;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


/**
 * User Service
 *
 * php version 8
 *
 * @category Service
 *
 * */
class UserService
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Get user using ID
     *
     * @param  int $id
     * @return User
     */
    public function get(int $id): ?User
    {
        return $this->user->find($id);
    }
    /**
     * Get users  using md5 ID
     *
     * @param  string $id
     * @return Collection
     */
    public function getByMd5Id(string $id): ?User
    {
        return $this->user->getByMd5Id($id);
    }

    /**
     * Get all users
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all users
        return $this->user->all();
    }
    /**
     * Make User Array
     *
     * @param  Array $data
     * @return User
     */
    public function make(array $data): ?User
    {
        return $this->create($data);
    }
    /**
     * Store User Array In database
     *
     * @param  Array $data
     * @return User
     */
    public function create(array $data): ?User
    {
        return $this->user->create($data);
    }



    /**
     * Update user
     *
     * @param  User $user
     * @param  array $data
     * @return void
     */
    public function update(User $user, array $data): void
    {
        //Update Theme object with given data
        $user->update($this->edit($user, $data));
    }

    /**
     * Edit user
     *
     * @param  User $user
     * @param  array $data
     * @return array
     */
    protected function edit(User $user, array $data): array
    {
        return array_merge($user->toArray(), $data);
    }

    /**
     * Delete user
     *
     * @param  User $user
     * @return void
     */
    public function delete(User $user): void
    {
        $user->delete();
    }



    /**
     * forceDelete
     *
     * @param  mixed $user
     * @return void
     */
    public function forceDelete($id)
    {
        $user = $this->user->withTrashed($id);
        return $user->forceDelete();
    }

    /**
     * activate
     *
     * @param  mixed $user
     * @return void
     */
    public function activate($id)
    {
        $user = $this->user->withTrashed($id);
        return $user->restore();
    }
}
