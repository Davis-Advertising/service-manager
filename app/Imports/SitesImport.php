<?php

namespace App\Imports;

use App\Issuer;
use App\Site;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SitesImport implements WithMultipleSheets {

    public function sheets(): array
    {
        return [
            // Select by sheet index
            0 => new SiteCollectionImport(),
            1 => new IssuerCollectionImport(),
            //2 => new UserCollectionImport()

            // Select by sheet name
            //'Other sheet' => new SecondSheetImport
        ];
    }
}

/*class SitesImport implements ToModel
{
    public function model(array $row)
    {
        return new Site([
            'site_name'    => $row[1],
            'site_url' => $row[2],
            'site_description' => $row[3],
            'client_status' => $row[4],
            'issuer_id' => $row[5],
            'ssl_renew_date' => $row[6],
            'ssl_last_updated' => $row[7],
            'webhost_expiration' => $row[8],
            'notified' => $row[9]
        ]);
    }
}*/

class SiteCollectionImport implements ToModel
{
    public function model(array $row)
    {
        return new Site([
            'site_name'    => $row[1],
            'site_url' => $row[2],
            'site_description' => $row[3],
            'client_status' => $row[4],
            'issuer_id' => $row[5],
            'ssl_renew_date' => $row[6],
            'ssl_last_updated' => $row[7],
            'webhost_expiration' => $row[8],
            'notified' => $row[9]
        ]);
    }
}

class IssuerCollectionImport implements ToModel
{
    public function model(array $row)
    {
        return new Issuer([
            'ssl_issuer'    => $row[1],
            'ssl_duration' => $row[2],
        ]);
    }
}

class UserCollectionImport implements ToModel
{
    public function model(array $row)
    {
        new User([
            /*'id'    => $row[0],
            'role_id'    => $row[1],*/
            'name'    => $row[2],
            'email' => $row[3],
            'avatar' => $row[4],
            'password' => Hash::make($row[5]),
            /*'remember_token' => $row[6],
            'settings' => $row[7],*/
        ]);
    }
}