<?php

namespace App\Providers;

use App\Models\Content\Page;
use App\Models\Notification;
use App\Models\Content\Comment;
use App\Models\Market\CartItem;
use App\Models\Setting\Setting;
use App\Models\Footer\FooterLink;
use App\Models\Footer\FooterBadge;
use App\Models\Footer\FooterSocial;
use App\Models\Footer\FooterFeature;
use App\Models\Footer\FooterSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $setting = Cache::rememberForever('site_setting', function () {
            return Setting::first(); // اولین ردیف جدول settings
        });


        View::share('setting', Setting::first());

        view()->composer('admin.layouts.header', function ($view) {
            $view->with('unseenComments', Comment::where('seen', 0)->get());
            $view->with('notifications', Notification::where('read_at', null)->get());
        });



        view()->composer('customer.layouts.header', function ($view) {
            if (Auth::check()) {
                $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
                $view->with('cartItems', $cartItems);
                $view->with('pages', Page::all());
            }
        });

        // //footer features
        // View::composer('*', function ($view) {
        //     $view->with([
        //         'footerFeatures' => FooterFeature::all()
        //     ]);
        // });

        // //footer links
        // View::composer('*', function ($view) {
        //     $view->with([
        //         'firstColumnLinks'  => FooterLink::where('position', 1)->get(),
        //         'secondColumnLinks' => FooterLink::where('position', 2)->get(),
        //         'thirdColumnLinks'  => FooterLink::where('position', 3)->get(),
        //     ]);
        // });

        //  //footer social
        // View::composer('*', function ($view) {
        //     $view->with([
        //         'footerSocials' => FooterSocial::all()
        //     ]);
        // });


        //    //footer badges
        // View::composer('*', function ($view) {
        //     $view->with([
        //         'footerBadges' => FooterBadge::all()
        //     ]);
        // });


        // //footer settings
        // View::composer('*', function ($view) {
        //     $view->with([
        //         'footerSetting' => FooterSetting::first()
        //     ]);
        // });

        View::composer('*', function ($view) {
            $view->with([
                'footerFeatures' => Cache::rememberForever('footerFeatures', fn() => FooterFeature::all()),
                'firstColumnLinks' => Cache::rememberForever('firstColumnLinks', fn() => FooterLink::where('position', 1)->get()),
                'secondColumnLinks' => Cache::rememberForever('secondColumnLinks', fn() => FooterLink::where('position', 2)->get()),
                'thirdColumnLinks' => Cache::rememberForever('thirdColumnLinks', fn() => FooterLink::where('position', 3)->get()),
                'footerSocials' => Cache::rememberForever('footerSocials', fn() => FooterSocial::all()),
                'footerBadges' => Cache::rememberForever('footerBadges', fn() => FooterBadge::all()),
                'footerSetting' => Cache::rememberForever('footerSetting', fn() => FooterSetting::first()),
            ]);
        });
    }
}
