<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * The guard can be define
     *
     * @var string
     */
    protected $guard;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Description
     *
     * @return mixed
     *
     * @throws Illuminate\Validation\ValidationException
     */
    public function authenticated()
    {
        $auth = Auth::guard($this->guard ?? 'web')->attempt($this->credentials());

        if (!$auth) {
            RateLimiter::hit($this->throttleKey(), 300);

            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the throttle rate limiter
     *
     * @return mixed
     *
     * @throws Illuminate\Validation\ValidationException
     */
    protected function ensureIsNotRatelimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60)
            ])
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }

    /**
     * Define the throttle key
     *
     * @return string
     */
    protected function throttleKey(): string
    {
        return Str::lower($this->input('username'))."|".$this->ip();
    }

    /**
     * Set guard property value
     *
     * @return string
     */
    public function setGuard($guard): string
    {
        $this->guard =  $guard;
    }

    /**
     * descripion
     *
     * @return array
     */
    protected function credentials(): array
    {
        $field = filter_var($this->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $this->input('username'),
            'password' => $this->input('password')
        ];
    }
}
