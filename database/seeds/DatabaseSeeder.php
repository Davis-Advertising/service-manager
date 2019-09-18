<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            /*array(
                'firstname' => 'Davis',
                'lastname' => 'Advertising',
                'email' => 'davistech@davisad.com',
                'password' => bcrypt('D@v15team')
            ),*/
            array(
                'firstname' => 'Ray',
                'lastname' => 'Lo',
                'email' => 'rlo@davisad.com',
                'password' => bcrypt('Temp!234')
            )
        ]);

        DB::table('sites')->insert([
            array('site_name' => 'Brookwood Financial',
                'site_url' => 'https://davisad.com',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Central Mass Research',
                'site_url' => 'https://centralmassresearch.com',
                'site_description' => 'Davis Advertising Focus Group Website',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Central Rock Gym',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Chalotte Klein Dance Centers',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Charlton Furniture',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Coastal Heritage Bank',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Connecticut Fishing Expo',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Cornerstone Bank',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Davis Advertising',
                'site_url' => 'https://davisad.com',
                'site_description' => 'Davis Advertising Main Website',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Leominster Credit Union',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Meredith Village Savings Bank',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Merrimack County Savings Bank',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Mill River Wealth Management',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'New England Fishing Expo',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'New Hampshire Fishing Expo',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'New England Mutual Bancorp',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Release Well Being Center',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Riverdale Mills',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Rockingham Boat',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'SIS Blog',
                'site_url' => 'https://davisad.com',
                'site_description' => 'Davis Advertising Main Website',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Southgate at Shrewbury',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Tower Kill Botanic Garden',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Uncle Willies BBQ',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Wayback Burgers',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Why Me',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
            array('site_name' => 'Yesway',
                'site_url' => '',
                'site_description' => '',
                'client_status' => 'ACTIVE'),
        ]);

        /*DB::table('roles')->insert([
            array(
                'name' =>'Administrator',
                'display_name' => 'Administrator'),
            array(
                'name' =>'Editor',
                'display_name' => 'Editor'
            )
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);*/

        DB::table('services')->insert([

            array(
                'name' => 'Domain Name',
                'description' => ''
            ),
            array(
                'name' => 'SSL Certificate',
                'description' => ''
            ),
            array(
                'name' => 'Web Hosting',
                'description' => ''
            )
        ]);


    }
}
