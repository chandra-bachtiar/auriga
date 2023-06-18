<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Sheet;

class ExcelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Sheet::macro('prependView', function ($view, $data = []) {
            $html = view($view, $data)->render();
            $this->prependSheet(1, new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($this->getDelegate(), 'View'));
            $this->getDelegate()->getSheetByName('View')->setCellValue('A1', $html);
            $this->moveSheet(1, 0);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
