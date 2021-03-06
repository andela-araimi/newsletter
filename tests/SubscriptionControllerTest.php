<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SubscriptionControllerTest extends TestCase
{    
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testFetchNewletter()
    // {
    //     $user = factory('App\User')->make(
    //         ['id' => -23083333]
    //     );

    //     $newsletter = factory('App\User')->make([
    //         'user_id' => $user->id,
    //     ]);
    //     // dd($newsletter);
    //     $this->get('api/v1/newsletters');

    //     dd($this->response->getContent());
    //     $this->seeStatusCode(200);
    //     $this->assertArrayHasKey('id', $this->response->getContent());
    // }

    /**
     * test newsletter not found.
     *
     * @return void
     */
    public function testSubscriptionDoNotSucceed()
    {
        $newsletter = factory('App\Newsletter')->make(
            ['id' => 1]
        );

        $this->json('POST', 'api/v1/subscription', ['email' => 'sample@y.com', 'newsletter_id' => $newsletter->id])
             ->seeJson([
                'message' => 'Cannot find newsletter',
             ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testRegisterUserfailedDueToEmailAlreadyExist()
    // {
    //     $this->json('POST', 'api/v1/register', ['name' => 'Sally', 'email' => 'sample@y.com', 'password' => 'sample'])
    //         ->json('POST', 'api/v1/register', ['name' => 'Sally', 'email' => 'sample@y.com', 'password' => 'sample'])
    //          ->seeJson([
    //             'email' => ['The email has already been taken.'],
    //          ]);
    // }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testNewsletterfailedDueToRequiredField()
    // {
    //     $this->json('POST', 'api/v1/newsletter', [])
    //          ->seeJson([
    //             'title' => ['The title field is required.'],
    //             'description' => ['The description field is required.'],
    //          ]);
    // }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testDeleteNewsletter()
    // {
    //     $user = factory('App\User')->make(
    //         ['id' => 1]
    //     );

    //     $newsletter = factory('App\User')->make([
    //         'id' => 100,
    //         'user_Id' => $user->id
    //     ]);
    //     // dd($newsletter);

    //     $this->json('DELETE', 'api/v1/newsletter/' . $newsletter->id);
    //         dd($this->response->getContent());
    //          // ->seeJson([
    //          //    'message' => 'Newsletter was successful created',
    //          // ]);
    // }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testAuthenticateUser()
    // {
    //     $this->json('POST', 'api/v1/register', ['name' => 'sally', 'email' => 'sample@y.com', 'password' => 'sample'])
    //         ->json('POST', 'api/v1/login', ['email' => 'sample@y.com', 'password' => 'sample'])
    //          ->seeStatusCode(200);
    // }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testEmailDoesNotExist()
    // {
    //     $this->json('POST', 'api/v1/login', ['email' => 'sample@y.com', 'password' => 'sample'])
    //         ->seeStatusCode(400)
    //         ->seeJson([
    //             'error' => 'Email does not exist.',
    //          ]);
    // }
}
