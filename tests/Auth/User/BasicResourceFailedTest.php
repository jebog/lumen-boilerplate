<?php

namespace Tests\Auth\User;

use App\Models\Auth\User\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class BasicResourceFailedTest extends TestCase
{
    /**
     * @test
     */
    public function cannotDeleteSelf()
    {
        $user = $this->loggedInAs();

        $this->delete(route('backend.users.destroy', ['id' => $user->getHashedId()]), [], $this->addHeaders());

        $this->assertResponseStatus(422);
        $this->seeJson([
            'message' => 'You cannot delete your self.',
        ]);
    }

    /**
     * @param $environment
     *
     * @test
     * @testWith ["production"]
     *      ["local"]
     */
    public function getUserWithWrongHashedId($environment)
    {
        putenv("APP_ENV=$environment");
        $this->loggedInAs();

        $hashedId = factory(User::class)->create()->getHashedId();

        // remove last char
        $id = substr($hashedId, 0, strlen($hashedId) - 1);

        $this->get(route('backend.users.show', ['id' => $id]), $this->addHeaders());
        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => $environment == 'production'
                ? Response::$statusTexts[Response::HTTP_NOT_FOUND]
                : 'Invalid hashed id.',
        ]);
    }

    /**
     * @test
     */
    public function getNoneExistedUser()
    {
        $this->loggedInAs();

        $user = factory(User::class)->create();

        $hashedId = $user->getHashedId();

        $user->delete();

        $this->get(route('backend.users.show', ['id' => $hashedId]), $this->addHeaders());
        $this->assertResponseStatus(404);
    }
}
