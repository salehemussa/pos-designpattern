<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Models
use App\Models\Product;
use App\Models\User;

// Policies
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Register your model policies here
        Product::class => ProductPolicy::class,
        // Add more model policies as needed
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Optional: Additional Gates if needed
        Gate::define('admin-only', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('customer-only', function (User $user) {
            return $user->role === 'customer';
        });

        // Example: check if user can manage products
        Gate::define('manage-products', function (User $user) {
            return $user->role === 'admin';
        });

        // Example usage:
        // Gate::allows('manage-products'); returns true for admin
    }
}
