<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories\Contracts\Operations;

interface DeleteInterface
{
    public function delete($id);
}
