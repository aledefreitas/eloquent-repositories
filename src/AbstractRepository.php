<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories;

use Aledefreitas\EloquentRepositories\Contracts\RepositoryInterface;
use Aledefreitas\EloquentRepositories\Contracts\Operations\ReadInterface;
use Aledefreitas\EloquentRepositories\Base\Operations\Read;
use Aledefreitas\EloquentRepositories\Exceptions\RepositoryException;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * Abstract class for Repository
 * @package Aledefreitas\EloquentRepositories
 */
abstract class AbstractRepository implements
    RepositoryInterface,
    ReadInterface
{
    use Read;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Specifies the model name
     *
     * @return mixed
     */
    abstract protected function model();

    /**
     * Gets the current model
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Instantiates the model inside the repository
     *
     * @throws RepositoryException
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function makeModel()
    {
        $model = App::make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of " . Model::class
            );
        }

        return $model;
    }

    /**
     * Model Accessor
     *
     * @param  string  $name
     *
     * @return null|\Illuminate\Database\Eloquent\Builder
     */
    public function __get(string $name)
    {
        if ($name === 'model') {
            return $this->makeModel();
        }

        return null;
    }
}
