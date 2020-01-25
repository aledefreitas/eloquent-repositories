<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Contracts\Operations;

interface CreateInterface
{
    public function create(array $data);
}
