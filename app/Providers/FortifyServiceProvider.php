<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $this->app->singleton(LoginResponseContract::class, function () {
            return new class implements LoginResponseContract {
                /**
                 * @param  \Illuminate\Http\Request  $request
                 * @return \Symfony\Component\HttpFoundation\Response
                 */
                public function toResponse($request)
                {
                    $user = auth()->user();

                    if ($user->role_id) {
                        switch ($user->role_id) {
                            case 1: 
                                return redirect('/proveedor');
                            case 2:
                                return redirect('/barista/show');
                            case 3: 
                                return redirect('/venta/show');
                            default:
                                return redirect('/home');
                        }
                    }

                    // Si el usuario no tiene un rol, redirige a la página de inicio por defecto
                    return redirect('/home');
                }
            };
        });
    }
}