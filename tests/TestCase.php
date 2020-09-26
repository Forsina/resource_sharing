<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp() :void
    {
    	parent::setUp();
        DB::statement('PRAGMA foreign_keys=on;');
        $this->disableExceptionHandling();

/*        TestResponse::macro('followRedirects', function ($testCase) {
            $response = $this;

            while ($response->isRedirect()) {
                $response = $testCase->get($response->headers->get('Location'));
            }

            return $response;
        });*/
    }

    protected function signIn($user = null)		//accept a user but not require one
    {
    	$user = $user ?: create('App\User');	//if have a user pass it in othervise create one

    	$this->actingAs($user);

    	return $this;
    }

	// Hat tip, @adamwathan.
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }
}
