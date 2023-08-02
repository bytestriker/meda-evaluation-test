<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'type',
        'remember_token'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return User::class;
    }


    /**
     * Retrieve all records with given filter criteria
     */
    public function onlyAdmin(int $skip = null, int $limit = null, array $columns = ['*']): Builder
    {
        $query = $this->model->newQuery();

        $query->where('type', 'admin');

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }



    /**
     * Retrieve all records with given filter criteria
     */
    public function onlyEmployees(int $skip = null, int $limit = null, array $columns = ['*']): Builder
    {
        $query = $this->model->newQuery();

        $query->where('type', 'employee');

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

}
