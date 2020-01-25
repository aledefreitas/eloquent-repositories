<?php
/**
 * @author      Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Base\Operations;

use \Closure;
use Illuminate\Support\LazyCollection;

trait Read
{
    /**
     * Gets all records
     *
     * @return mixed
     */
    public function all(array $columns = ['*'])
    {
        return LazyCollection::make(function () use ($columns) {
            foreach ($this->model->cursor() as $item) {
                yield ($item->toArray());
            }
        });
    }

    /**
     * Paginates with the results from a given query function
     *
     * @param   int             $results_per_page
     * @param   null|Closure    $query              The query to retrieve data
     *
     * @return null|array
     */
    public function paginate(int $results_per_page = 10, Closure $query = null) : ?array
    {
        if (!is_null($query)) {
            $results = call_user_func($query, $this);
        } else {
            $results = $this->model;
        }

        return $results->paginate($results_per_page)->toArray();
    }

    /**
     * Gets a specific record, by its primary key
     *
     * @param   mixed       $id
     * @param   bool        $fail       Whether to fail if not found or not
     *
     * @return  null|array
     */
    public function findById($id, $fail = true) : ?array
    {
        if ($fail) {
            return $this->model::findOrFail($id)->toArray();
        }

        return $this->model::find($id)->toArray();
    }
}
