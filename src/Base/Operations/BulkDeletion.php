<?php
/**
 * @author      Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Base\Operations;

trait BulkDeletion
{
    /**
     * Creates a new record
     *
     * @param   array       $ids        IDs to delete
     *
     * @return int
     */
    public function deleteAll(array $ids = [])
    {
        return $this->model::destroy($ids);
    }

    /**
     * Deletes all records where column's value matches value sent
     *
     * @param   string      $column
     * @param   mixed       $value
     *
     * @return mixed
     */
    public function deleteAllWhere(string $column, $value)
    {
        return $this->model::where($column, $value)->delete();
    }

    /**
     * Deletes all records where column's value matches values sent
     *
     * @param   string      $column
     * @param   mixed       $values
     *
     * @return mixed
     */
    public function deleteAllWhereIn(string $column, $values)
    {
        return $this->model::whereIn($column, $values)->delete();
    }
}
