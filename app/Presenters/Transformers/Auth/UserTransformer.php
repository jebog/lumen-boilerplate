<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 11/24/18
 * Time: 3:31 PM
 */

namespace App\Presenters\Transformers\Auth;

use App\Models\Auth\User\User;
use App\Presenters\Transformers\BaseTransformer;

class UserTransformer extends BaseTransformer
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'roles',
        'permissions',
    ];
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * A Fractal transformer.
     *
     * @param \App\Models\Auth\User\User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        $response = [
            'id' => $user->getHashedId(),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
        ];

        $response = $this->filterData($response, [
            'real_id' => $user->id,
        ]);

        return $this->addTimesHumanReadable($user, $response);
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer, 'roles');
    }

    public function includePermissions(User $user)
    {
        return $this->collection($user->permissions, new PermissionTransformer, 'permissions');
    }
}
