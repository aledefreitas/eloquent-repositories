<?php
/**
 * @author      Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Base\Operations;

trait Update
{
    /**
     * Updates a record
     *
     * @param   int         $id
     * @param   array       $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data = [])
    {
        $entity = $this->model::findOrFail($id);
        $entity->update($data);

        return $entity;
    }

    /**
     * Upserts a record
     *
     * @param  array  $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function upsert(array $data = [])
    {
        $id = $data[$this->model->getKeyName()];
        unset($data[$this->model->getKeyName()]);

        if (!isset($id)) {
            return $this->model::create($data);
        }

        return $this->update(
            $id,
            $data
        );
    }
}
