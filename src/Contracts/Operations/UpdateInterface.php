<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Contracts\Operations;

interface UpdateInterface
{
    public function update($id, array $data = []);
}
