<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `states` (`id`, `dateCreated`, `dateModified`, `createdBy`, `createdByName`, `modifiedBy`, `modifiedByName`, `name`, `abbr`) VALUES
        ('1', '2021-06-18 22:51:12', '2021-06-18 22:51:12', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Alabama', 'AL'),
        ('10', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Georgia', 'GA'),
        ('11', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Hawaii', 'HI'),
        ('12', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Idaho', 'ID'),
        ('13', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Illinois', 'IL'),
        ('14', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Indiana', 'IN'),
        ('15', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Iowa', 'IA'),
        ('16', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Kansas', 'KS'),
        ('17', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Kentucky', 'KY'),
        ('18', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Louisiana', 'LA'),
        ('19', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Maine', 'ME'),
        ('2', '2021-06-18 22:51:12', '2021-06-18 22:51:12', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Alaska', 'AK'),
        ('20', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Maryland', 'MD'),
        ('21', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Massachusetts', 'MA'),
        ('22', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Michigan', 'MI'),
        ('23', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Minnesota', 'MN'),
        ('24', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Mississippi', 'MS'),
        ('25', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Missouri', 'MO'),
        ('26', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Montana', 'MT'),
        ('27', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Nebraska', 'NE'),
        ('28', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Nevada', 'NV'),
        ('29', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'New Hampshire', 'NH'),
        ('3', '2021-06-18 22:51:12', '2021-06-18 22:51:12', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Arizona', 'AZ'),
        ('30', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'New Jersey', 'NJ'),
        ('31', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'New Mexico', 'NM'),
        ('32', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'New York', 'NY'),
        ('33', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'North Carolina', 'NC'),
        ('34', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'North Dakota', 'ND'),
        ('35', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Ohio', 'OH'),
        ('36', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Oklahoma', 'OK'),
        ('37', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Oregon', 'OR'),
        ('38', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Pennsylvania', 'PA'),
        ('39', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Rhode Island', 'RI'),
        ('4', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Arkansas', 'AR'),
        ('40', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'South Carolina', 'SC'),
        ('41', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'South Dakota', 'SD'),
        ('42', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Tennessee', 'TN'),
        ('43', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Texas', 'TX'),
        ('44', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Utah', 'UT'),
        ('45', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Vermont', 'VT'),
        ('46', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Virginia', 'VA'),
        ('47', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Washington', 'WA'),
        ('48', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'West Virginia', 'WV'),
        ('49', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Wisconsin', 'WI'),
        ('5', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'California', 'CA'),
        ('50', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Wyoming', 'WY'),
        ('6', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Colorado', 'CO'),
        ('7', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Connecticut', 'CT'),
        ('8', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Delaware', 'DE'),
        ('9', '2021-06-18 22:51:13', '2021-06-18 22:51:13', 'admin', 'Admin Admin', 'admin', 'Admin Admin', 'Florida', 'FL');
    ");
    }
}
