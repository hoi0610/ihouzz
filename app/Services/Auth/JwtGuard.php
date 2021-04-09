<?php

namespace App\Services\Auth;

use App\Facade\ApiSetting;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;

class JwtGuard implements Guard
{
    protected $request;
    protected $name;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->name = 'jwt';
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array  $credentials
     * @param  bool   $remember
     * @return bool
     */
    public function attempt(array $credentials = [], $type , $remember = false)
    {
        $res = ApiSetting::login($type, $credentials);

        // If an implementation of UserInterface was returned, we'll ask the provider
        // to validate the user against the given credentials, and if they are in
        // fact valid we'll log the users into the application and return true.

        if (isset($res['status']) && $res['status'] == 'success') {
            $user_token = $res['data'];
            if(isset($user_token['user']) && $user_token['user']) {
                $this->request->session()->put($this->getName(), $user_token['user']['id']);
                $this->request->session()->migrate(true);
                $this->token($user_token['token']);

                \App\Helpers\Api::user( $user_token['user'], $user_token['expires_in'] );
//            Auth('jwt')->login($user_token['user']);
            } elseif (isset($user_token['employee']) && $user_token['employee']) {
                $this->request->session()->put($this->getName(), $user_token['employee']['id']);
                $this->request->session()->migrate(true);
                $this->token($user_token['token']);

                \App\Helpers\Api::user( $user_token['employee'], $user_token['expires_in'] );
//            Auth('jwt')->login($user_token['user']);
            }

            $res_favorite = ApiSetting::getFavoriteProducts();
            $this->request->session()->put($this->getName().'_favorites', collect($res_favorite['data'])->pluck('id')->all());
            $this->request->session()->migrate(true);


            return ['status' => 'success'];
        }

        // If the authentication attempt fails we will fire an event so that the user
        // may be notified of any suspicious attempts to access their account from
        // an unrecognized user. A developer may listen to this event as needed.

//        $this->fireFailedEvent($user, $credentials);

        return $res;
    }

    public function loginWithUserToken($user_token) {
        $this->request->session()->put($this->getName(), $user_token['user']['id']);
        $this->request->session()->migrate(true);
        $this->token($user_token['token']);

        \App\Helpers\Api::user( $user_token['user'], $user_token['expires_in'] );
    }

    /**
     * Get a unique identifier for the auth session value.
     *
     * @return string
     */
    public function getName()
    {
        return 'login_'.$this->name.'_'.sha1(static::class);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Update the session with the given ID.
     *
     * @param  string  $id
     * @return void
     */
    protected function updateSession($id)
    {
        $this->session->put($this->getName(), $id);

        $this->session->migrate(true);
    }

    /**
     * Determine if the user matches the credentials.
     *
     * @param  mixed  $user
     * @param  array  $credentials
     * @return bool
     */
    protected function hasValidCredentials($user, $credentials)
    {
//        return ! is_null($user) && $this->provider->validateCredentials($user, $credentials);
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check() {
        return ! is_null($this->user());
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest() {
        return ! $this->check();
    }

    public function authenticate() {
        return ! is_null($this->user());
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user() {
        $token = $this->token();

        if ($token) {
            $user = \App\Helpers\Api::user();
            return $user;
        }

        return null;
    }
    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout()
    {
        // If we have an event dispatcher instance, we can fire off the logout event
        // so any further processing can be done. This allows the developer to be
        // listening for anytime a user signs out of this application manually.
//        $this->clearUserDataFromStorage();

        $this->request->session()->remove($this->getName());
        $this->request->session()->remove($this->getName().'_token');

//        if (! is_null($this->user)) {
//            $this->cycleRememberToken($user);
//        }
//
//        if (isset($this->events)) {
//            $this->events->dispatch(new Events\Logout($user));
//        }

        // Once we have fired the logout event we will clear the users out of memory
        // so they are no longer available as the user is no longer considered as
        // being signed into this application and should not be available here.

//        $this->loggedOut = true;
    }
    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id() {
        return $this->request->session()->get($this->getName());
    }

    public function token($token=null) {
        $key = $this->getName().'_token';

        if (!is_null($token)) {
            $this->request->session()->put($key, $token);
        }

        return $this->id() ? $this->request->session()->get($key) : false;
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = []) {
        die('validate');
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function setUser(Authenticatable $user) {
        $this->user = $user;

        $this->loggedOut = false;

        $this->fireAuthenticatedEvent($user);

        return $this;
    }

    /**
     * Update the session with the given data.
     *
     * @param  string  $id
     * @return void
     */
    public function updateSessionFavorite($data)
    {
        $this->request->session()->put($this->getName().'_favorites', $data);

        $this->request->session()->migrate(true);
    }
    /**
     * get the session favorite.
     *
     * @param  string  $id
     * @return void
     */
    public function getSessionFavorite()
    {
        return $this->request->session()->get($this->getName().'_favorites', null);
    }

}
