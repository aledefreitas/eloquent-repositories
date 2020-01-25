<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Contracts\Operations;

use \Closure;

interface ReadInterface
{
    public function all(array $columns = ['*']);
    public function findById($id, $fail = true) : ?array;
    public function paginate(int $results_per_page = 10, Closure $query = null) : ?array;
}
