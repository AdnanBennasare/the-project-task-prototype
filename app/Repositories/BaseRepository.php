<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;


abstract class BaseRepository
{
    protected $model;
    protected $paginationLimit = 8;



    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     */
    abstract public function getFieldsSearchable(): array;

    /**
     * Configure the Model
     */
    abstract public function model(): string;

    public function makeModel()
    {
        $model = app($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }



    public function create(array $input): Model
    {  
        $model = $this->model->newInstance($input);
        $model->save();
        return $model;
    }

 
// BaseRepository.php



    public function paginate($search = [], $perPage = null, array $columns = ['*']): LengthAwarePaginator
    {
        $query = $this->allQuery($search);

        if (is_null($perPage)) {
            $perPage = $this->paginationLimit;
        }
        return $query->paginate($perPage, $columns);
    }

    public function allQuery($search = [], int $skip = null, int $limit = null): Builder
    {
        $query = $this->model->newQuery();

        if (is_array($search) && count($search)) {
            foreach ($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    if (!is_null($value)) {
                        $query->where($key, $value);
                    }
                }
            }
        } else {
            if (!is_null($search)) {
                foreach ($this->getFieldsSearchable() as $searchKey) {
                    $query->orWhere($searchKey, 'LIKE', '%' . $search . '%');
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }


}
