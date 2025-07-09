<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
 protected $policies = [
    \App\Models\Cart::class => \App\Policies\Cart\Cartpolicy::class,
    \App\Models\CartItem::class => \App\Policies\CartItem\CartItemPolicy::class,
    \App\Models\Categorie::class => \App\Policies\category\CategoriePolicy::class,
    \App\Models\Product::class => \App\Policies\Products\ProductsPolicy::class,
];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
