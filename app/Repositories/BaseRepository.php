<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 11/24/18
 * Time: 3:25 PM
 */

namespace App\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository as BaseRepo;
use Prettus\Repository\Traits\CacheableRepository;

abstract class BaseRepository extends BaseRepo implements CacheableInterface
{
    use CacheableRepository {
        serializeCriteria as protected serializeCriteriaOverride;
    }

    /**
     * {@inheritdoc}
     */
    protected function serializeCriteria()
    {
        /**
         * this will remove if pull request merge.
         * https://github.com/andersao/l5-repository/pull/581
         */
        return $this->serializeCriteriaOverride() . serialize($this->presenter);
    }
}