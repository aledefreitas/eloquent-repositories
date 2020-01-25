<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Contracts\Operations;

interface BulkDeletionInterface
{
    public function deleteAll(array $ids);
    public function deleteAllWhere(string $column, $value);
    public function deleteAllWhereIn(string $column, $values);
}
