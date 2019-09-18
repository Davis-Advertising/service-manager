<?php

namespace App\Exports;

use App\Issuer;
use App\Site;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

/*class SitesExport implements FromCollection
{
    public function collection()
    {
        $sheets = [];
        $sheets[] = Site::query();
        $sheets[] = Issuer::query();

        return $sheets;
    }
}*/

/*class SitesExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        //$sheets[] = Site::query();
        //$sheets[] = Issuer::query();

        $collection = collect( Site::query() )->merge( Issuer::query() );
        return $collection;
    }
}*/

class SitesExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [];
        $collections = array('site', 'issuer');

        foreach ($collections as $collection)
        {
            $sheets[] = new SiteListSheet($collection);
        }

        return $sheets;
    }
}

class SiteListSheet implements FromQuery
{
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function query()
    {

        switch ($this->collection) {

            case 'site':
                return Site::query();
                break;
            case 'issuer':
                return Issuer::query();
                break;
            /*case 'user':
                return User::query();
                break;*/
        }

    }

}