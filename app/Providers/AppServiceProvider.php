<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\View::composer(
            ['components.navbar.notif-dropdown', 'components.navbar.pill-2'], 
            function ($view) {
                if (\Illuminate\Support\Facades\Auth::guard('pelanggan')->check()) {
                    $user = \Illuminate\Support\Facades\Auth::guard('pelanggan')->user();
                    $unreadNotifications = $user->unreadNotifications;
                    $allNotifications    = $user->notifications()->latest()->take(15)->get();
                    $view->with('unreadNotifications', $unreadNotifications);
                    $view->with('allNotifications',    $allNotifications);
                    $view->with('unreadCount',         $unreadNotifications->count());
                    $view->with('totalNotifCount',     $allNotifications->count());
                } else {
                    $view->with('unreadNotifications', collect([]));
                    $view->with('allNotifications',    collect([]));
                    $view->with('unreadCount',         0);
                    $view->with('totalNotifCount',     0);
                }
            }
        );

        \Illuminate\Support\Facades\View::composer(
            ['layouts.admin'], 
            function ($view) {
                if (\Illuminate\Support\Facades\Auth::guard('admin')->check()) {
                    $admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
                    try {
                        $unreadNotifications = $admin->unreadNotifications;
                        $allNotifications    = $admin->notifications()->latest()->take(15)->get();
                        $unreadCount         = $unreadNotifications->count();
                    } catch (\Exception $e) {
                        $unreadNotifications = collect([]);
                        $allNotifications    = collect([]);
                        $unreadCount         = 0;
                    }
                    $view->with('adminUnreadNotifications', $unreadNotifications);
                    $view->with('adminAllNotifications',    $allNotifications);
                    $view->with('adminUnreadCount',         $unreadCount);
                } else {
                    $view->with('adminUnreadNotifications', collect([]));
                    $view->with('adminAllNotifications',    collect([]));
                    $view->with('adminUnreadCount',         0);
                }
            }
        );
    }
}
