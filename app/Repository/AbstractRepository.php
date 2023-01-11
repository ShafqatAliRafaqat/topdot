<?php

/**
 * by Muhammad Raza
 */

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;

class AbstractRepository
{

    protected $model;

    public function __construct($modelClass)
    {
        $this->model = $modelClass;
    }

    public function all()
    {
        return $this->query()->get();
    }

    /**
     * @param $id
     * @return array|object|null
     */
    public function getById($id)
    {
        return $this->query()->where('id', $id)->first();
    }

    /**
     * @param string $columnName
     * @param string|integer|null $columnValue
     * @return array|object|null
     */
    public function bySpecificColumns($searchArray)
    {
        return $this->query()->where($searchArray)->first();
    }

    public function deleteById($id)
    {
        return $this->query()->where('id', '=', $id)->delete();
    }

    /**
     * @param array $data
     * @return array|null
     */
    public function create(array $data)
    {
        return $this->query()->create($data);
    }

    /**
     * @param integer $id
     * @param array $data
     * @return array|null
     */
    public function update(int $id, array $data)
    {
        return $this->query()->where('id', $id)->update($data);
    }

    /**
     * @return Builder
     */
    protected function query()
    {
        return call_user_func([$this->model, 'query']);
    }

    /**
     * @return Builder
     */
    public function getQuery()
    {
        return $this->query();
    }

    /**
     * @return string
     */
    public function getTable()
    {
        $c = new $this->model();
        return $c->table;
    }

}
