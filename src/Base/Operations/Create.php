<?php
/**
 * @author      Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Base\Operations;

trait Create
{
    /**
     * Creates a new record
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data = [])
    {
        return $this->model::create($data);
    }
}
