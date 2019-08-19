<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/25/18
 * Time: 12:11 PM
 */

namespace Tests\Auth\User;

use App\Models\Auth\User\User;
use Tests\TestCase;

class BasicResourceSuccessTest extends TestCase
{

    /**
     * @test
     */
    public function createUser()
    {
        $this->loggedInAs();

        $this->post(route('backend.users.store'), $this->userData(), $this->addHeaders());
        $this->assertResponseStatus(201);

        $data = $this->userData();
        unset($data['password']);

        $this->seeInDatabase((new User)->getTable(), $data);
        $this->seeJson($data);
    }

    /**
     * @test
     */
    public function updateUser()
    {
        $this->loggedInAs();

        $user = factory(User::class)->create();

        $this->put(route('backend.users.update', ['id' => $user->getHashedId()]), $this->userData(),
            $this->addHeaders());
        $this->assertResponseOk();

        $data = $this->userData();
        unset($data['password']);

        $this->seeInDatabase((new User)->getTable(), array_merge($data, ['id' => $user->id]));
        $this->seeJson(array_merge($data, ['real_id' => $user->id]));
    }

    /**
     * @test
     */
    public function destroyUser()
    {
        $this->loggedInAs();

        $user = factory(User::class)->create();

        $this->delete(route('backend.users.destroy', ['id' => $user->getHashedId()]), [], $this->addHeaders());
        $this->assertResponseStatus(204);

        $this->notSeeInDatabase((new User)->getTable(), [
            'id' => $user->id,
            'deleted_at' => null,
        ]);
    }

    /**
     * @test
     */
    public function showUser()
    {
        $this->loggedInAs();
        $user = factory(User::class)->create($this->userData());

        $this->get(route('backend.users.show', [
            'id' => $user->getHashedId(),
        ]), $this->addHeaders());

        $this->assertResponseOk();
        $data = $this->userData();
        unset($data['password']);
        $this->seeJson($data);
    }
}