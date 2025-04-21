<?php

namespace App\Providers;

use App\Actions\Webshop\MigrateSessionCart;
use App\Factories\CartFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Laravel\Fortify\Fortify;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class AppServiceProvider extends ServiceProvider
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

        Model::unguard();
        Cashier::calculateTaxes();

        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                (new MigrateSessionCart)->migrate(
                    CartFactory::make(),
                    userCart: $user?->cart ?: CartFactory::make()->create([
                        'user_id' => $user->id,
                    ]),
                );
                return $user;
            }
        });


        Blade::stringable(function (Money $money) {
            $currency = new ISOCurrencies();
            $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currency);

            return $moneyFormatter->format($money);

        });
    }
}
