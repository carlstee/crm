<?php

namespace App\Providers;

use App\Cutomer;
use App\Employee;
use App\General;
use App\Timezone;
use App\TransExpense;
use App\TransIncome;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $time = Timezone::find(1);
        Config::set('app.timezone', $time->country);
        $general =General::find(1);
        $page_title = "Dashboard";

        $total_employee = Employee::count('id');

        $total_income = TransIncome::sum('amount');

        $total_expense = TransExpense::sum('amount');

        $total_result = $total_income - $total_expense;

        $result1 = $total_result * 100;

        $result = number_format($result1/$total_income);

        $to_date = date('Y-m-d', strtotime(Carbon::now()));
        $from_date = date('Y-m-d', strtotime('2017-01-01'));

        $main_chart_data = "[";
        $main_chart_data .= "{ year: '2011' , value:  25  }".",";
        $main_chart_data .= "{ year: '2012', value:  55  }".",";
        $main_chart_data .= "{ year: '2013' , value: 40  }".",";
        $main_chart_data .= "{ year: '2014', value:  65  }".",";
        $main_chart_data .= "{ year: '2015', value:  60  }".",";
        $main_chart_data .= "{ year: '2016', value:  72  }".",";
        $main_chart_data .= "{ year: '2017', value: ".$result." }".",";
        $main_chart_data .= "{ year: '2018', value: 10  }";

        $main_chart_data .= "]";


        View::share(compact('time','general','total_employee',
            'total_income',
            'total_expense',
            'main_chart_data', 'page_title'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
