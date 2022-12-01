<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;



class DashboardController extends Controller
{
    public function dashboard_1()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $logo = "images/KECO-logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        //Initial Location
        Mapper::map(41.881832,  -87.623177);

        //Adding Markers
        $Properties = Property::all();
        foreach ($Properties as $Property)
        {
        $location = Mapper::location($Property->address);
        Mapper::marker($location->getLatitude(), $location->getlongitude(), ['animation' => 'DROP', 'label' => $Property->street, 'title' => 'Marker', 'draggable' => false]);
        }

        //Total Properties Progress bar
        $total_propety = DB::select('
        SELECT COUNT(p.id) AS "Total", (SELECT COUNT(pp.id) FROM properties pp WHERE pp.download_status = "no") AS "Master",
        (SELECT COUNT(pp.id) FROM properties pp WHERE pp.download_status = "no")/COUNT(p.id) * 100 AS "Rate"
        FROM properties p
        ');
        $total_propety_array = json_decode(json_encode($total_propety), true);


        //Revenue Generated Graph
        $revenue_generated_retreieve = DB::select('
        SELECT mon.mon AS "Month", IFNULL(pp.revenue, 0) AS "revenue"
        FROM (
        SELECT "Jan" AS "mon" UNION SELECT "Feb" AS "mon" UNION SELECT "Mar" AS "mon" UNION SELECT "Apr" AS "mon" UNION
        SELECT "May" AS "mon" UNION SELECT "Jun" AS "mon" UNION SELECT "Jul" AS "mon" UNION SELECT "Aug" AS "mon" UNION
        SELECT "Sep" AS "mon" UNION SELECT "Oct" AS "mon" UNION SELECT "Nov" AS "mon" UNION SELECT "Dec" AS "mon"
        ) mon
        LEFT JOIN (
        SELECT DATE_FORMAT(p.created_at, "%b") AS "mon", SUM(p.revenue) AS "revenue"
        FROM properties p
        WHERE YEAR(p.created_at) = YEAR(NOW())
        GROUP BY DATE_FORMAT(p.created_at, "%b")
        ) pp ON pp.mon = mon.mon
        ORDER BY MONTH(STR_TO_DATE(CONCAT("2022-25-", mon.mon), "%Y-%d-%b"))');
        $revenue_generated_retreieve_array = json_decode(json_encode($revenue_generated_retreieve), true);

        //Calculating Last sum of month Revenue
        $lastmonth_revenue = DB::select('
        SELECT IFNULL(SUM(p.revenue), 0) AS premonthrevenue
        FROM properties p
        WHERE Month(p.created_at) = MONTH(DATE_SUB(NOW(),  INTERVAL 1 MONTH)) ');
        $lastmonth_revenue_array = json_decode(json_encode($lastmonth_revenue), true);

        return view('dashboard.index', compact('lastmonth_revenue_array','revenue_generated_retreieve_array','total_propety_array','page_title', 'page_description','action','logo','logoText'));
    }
    public function analytics()
    {
        // Leads Generated
        $leads_generated_retrieve = DB::select('
        SELECT mon.mon AS "Month", IFNULL(pp.leads, 0) AS "leads"
        FROM (
        SELECT "Jan" AS "mon" UNION SELECT "Feb" AS "mon" UNION SELECT "Mar" AS "mon" UNION SELECT "Apr" AS "mon" UNION
        SELECT "May" AS "mon" UNION SELECT "Jun" AS "mon" UNION SELECT "Jul" AS "mon" UNION SELECT "Aug" AS "mon" UNION
        SELECT "Sep" AS "mon" UNION SELECT "Oct" AS "mon" UNION SELECT "Nov" AS "mon" UNION SELECT "Dec" AS "mon"
        ) mon
        LEFT JOIN (
        SELECT DATE_FORMAT(p.created_at, "%b") AS "mon", COUNT(p.id) AS "leads"
        FROM properties p
        WHERE YEAR(p.created_at) = YEAR(NOW())
        GROUP BY DATE_FORMAT(p.created_at, "%b")
        ) pp ON pp.mon = mon.mon
        ORDER BY MONTH(STR_TO_DATE(CONCAT("2022-25-", mon.mon), "%Y-%d-%b"))
        ');
        $leads_generated = json_decode(json_encode($leads_generated_retrieve), true);

        // Leads Generated per Month
        $leads_generated_permonth_retrieve = DB::select('
        SELECT t.name, GROUP_CONCAT(t.cmon ORDER BY t.mon SEPARATOR ",") AS "CountChart"
        FROM(
        SELECT u.name, 1 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Jan"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 2 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Feb"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 3 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Mar"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 4 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Apr"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 5 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "May"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 6 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Jun"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 7 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Jul"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 8 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Aug"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 9 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Sep"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 10 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Oct"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 11 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Nov"
        GROUP BY u.name , DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 12 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.id) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND DATE_FORMAT(c.created_at, "%b") = "Dec"
        GROUP BY u.name , DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        ) t
        GROUP BY t.name
        ORDER BY t.name, t.mon, t.cmon DESC');

        $leads_generated_permonth = json_decode(json_encode($leads_generated_permonth_retrieve), true);
        //Storing Lead Data of each User in Array
        for ($i=0; $i < count($leads_generated_permonth); $i++) {
            $leads_generated_permonthCoount[$i] = $leads_generated_permonth[$i]['CountChart'];
        }

        //Exploding Comma in Status Data
        for ($j=0; $j < count($leads_generated_permonthCoount); $j++) {
            $chartCount[$j] = explode(',',$leads_generated_permonthCoount[$j]);
        }

        //Converting Into Final Array of Each User
         $leads_generated_permonth_final = array();
         for ($k=0; $k < count($leads_generated_permonthCoount); $k++) {
             $FinalArray['name'] = $leads_generated_permonth[$k]['name'];
             $FinalArray['data'] = $chartCount[$k];
             $leads_generated_permonth_final[] = $FinalArray;
         }

        //Contracts Generated Graph
        $contracts_generated_retreieve = DB::select('
        SELECT mon.mon AS "Month", IFNULL(pp.contracts, 0) AS "contracts"
        FROM (
        SELECT "Jan" AS "mon" UNION SELECT "Feb" AS "mon" UNION SELECT "Mar" AS "mon" UNION SELECT "Apr" AS "mon" UNION
        SELECT "May" AS "mon" UNION SELECT "Jun" AS "mon" UNION SELECT "Jul" AS "mon" UNION SELECT "Aug" AS "mon" UNION
        SELECT "Sep" AS "mon" UNION SELECT "Oct" AS "mon" UNION SELECT "Nov" AS "mon" UNION SELECT "Dec" AS "mon"
        ) mon
        LEFT JOIN (
        SELECT DATE_FORMAT(p.created_at, "%b") AS "mon", COUNT(p.contracts) AS "contracts"
        FROM properties p
        WHERE YEAR(p.created_at) = YEAR(NOW())
        AND p.contracts = 1
        GROUP BY DATE_FORMAT(p.created_at, "%b")
        ) pp ON pp.mon = mon.mon
        ORDER BY MONTH(STR_TO_DATE(CONCAT("2022-25-", mon.mon), "%Y-%d-%b"))');
        $contracts_generated_retreieve_array = json_decode(json_encode($contracts_generated_retreieve), true);

        // Contracts Generated per Month
        $Contracts_generated_permonth_retrieve = DB::select('
        SELECT t.name, GROUP_CONCAT(t.cmon ORDER BY t.mon SEPARATOR ",") AS "CountChart"
        FROM(
        SELECT u.name, 1 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Jan"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 2 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Feb"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 3 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Mar"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 4 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Apr"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 5 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "May"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 6 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Jun"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 7 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Jul"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 8 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Aug"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 9 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Sep"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 10 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Oct"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 11 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Nov"
        GROUP BY u.name , DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 12 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.contracts) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.contracts = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Dec"
        GROUP BY u.name , DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        ) t
        GROUP BY t.name
        ORDER BY t.name, t.mon, t.cmon DESC');

        $contracts_generated_permonth = json_decode(json_encode($Contracts_generated_permonth_retrieve), true);

         //Storing contract Data of each User in Array
         for ($i=0; $i < count($contracts_generated_permonth); $i++) {
            $contracts_generated_permonthCoount[$i] = $contracts_generated_permonth[$i]['CountChart'];
        }

        //Exploding Comma in Status Data
        for ($j=0; $j < count($contracts_generated_permonthCoount); $j++) {
            $chartCount[$j] = explode(',',$contracts_generated_permonthCoount[$j]);
        }

        //Converting Into Final Array of Each User
         $contracts_generated_permonth_final = array();
         for ($k=0; $k < count($contracts_generated_permonthCoount); $k++) {
             $FinalArray['name'] = $contracts_generated_permonth[$k]['name'];
             $FinalArray['data'] = $chartCount[$k];
             $contracts_generated_permonth_final[] = $FinalArray;
         }

         //Appointments Generated Graph
        $appointments_generated_retreieve = DB::select('
        SELECT mon.mon AS "Month", IFNULL(pp.appointments, 0) AS "appointments"
        FROM (
        SELECT "Jan" AS "mon" UNION SELECT "Feb" AS "mon" UNION SELECT "Mar" AS "mon" UNION SELECT "Apr" AS "mon" UNION
        SELECT "May" AS "mon" UNION SELECT "Jun" AS "mon" UNION SELECT "Jul" AS "mon" UNION SELECT "Aug" AS "mon" UNION
        SELECT "Sep" AS "mon" UNION SELECT "Oct" AS "mon" UNION SELECT "Nov" AS "mon" UNION SELECT "Dec" AS "mon"
        ) mon
        LEFT JOIN (
        SELECT DATE_FORMAT(p.created_at, "%b") AS "mon", COUNT(p.appointments) AS "appointments"
        FROM properties p
        WHERE YEAR(p.created_at) = YEAR(NOW())
        AND p.appointments = 1
        GROUP BY DATE_FORMAT(p.created_at, "%b")
        ) pp ON pp.mon = mon.mon
        ORDER BY MONTH(STR_TO_DATE(CONCAT("2022-25-", mon.mon), "%Y-%d-%b"))');
        $appointments_generated_retreieve_array = json_decode(json_encode($appointments_generated_retreieve), true);

        // Appointments Generated per Month
        $appointments_generated_permonth_retrieve = DB::select('
        SELECT t.name, GROUP_CONCAT(t.cmon ORDER BY t.mon SEPARATOR ",") AS "CountChart"
        FROM(
        SELECT u.name, 1 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Jan"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 2 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Feb"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 3 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Mar"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 4 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Apr"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 5 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "May"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 6 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Jun"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 7 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Jul"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 8 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Aug"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 9 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Sep"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 10 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Oct"
        GROUP BY u.name, DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 11 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Nov"
        GROUP BY u.name , DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        UNION ALL
        SELECT u.name, 12 as "mon", IFNULL(a.cmon, 0) AS "cmon"
        FROM users u
        LEFT JOIN (
        SELECT u.name, DATE_FORMAT(c.created_at, "%b") AS "mon", COUNT(c.appointments) AS "cmon"
        FROM users u
        LEFT JOIN properties c ON c.emp_id = u.id
        WHERE YEAR(c.created_at) = YEAR(NOW())
        AND c.appointments = 1
        AND DATE_FORMAT(c.created_at, "%b") = "Dec"
        GROUP BY u.name , DATE_FORMAT(c.created_at, "%b")) a ON a.name = u.name
        ) t
        GROUP BY t.name
        ORDER BY t.name, t.mon, t.cmon DESC');

        $appointments_generated_permonth = json_decode(json_encode($appointments_generated_permonth_retrieve), true);

         //Storing contract Data of each User in Array
         for ($i=0; $i < count($appointments_generated_permonth); $i++) {
            $appointments_generated_permonthCoount[$i] = $appointments_generated_permonth[$i]['CountChart'];
        }

        //Exploding Comma in Status Data
        for ($j=0; $j < count($appointments_generated_permonthCoount); $j++) {
            $chartCount[$j] = explode(',',$appointments_generated_permonthCoount[$j]);
        }

        //Converting Into Final Array of Each User
         $appointments_generated_permonth_final = array();
         for ($k=0; $k < count($appointments_generated_permonthCoount); $k++) {
             $FinalArray['name'] = $appointments_generated_permonth[$k]['name'];
             $FinalArray['data'] = $chartCount[$k];
             $appointments_generated_permonth_final[] = $FinalArray;
         }



         $page_title = 'Dashboard';
         $page_description = 'Some description for the page';
         $logo = "images/KECO-logo.png";
         $logoText = "images/logo-text.png";
         $action = __FUNCTION__;
        return view('dashboard.analytics', compact('appointments_generated_permonth_final','appointments_generated_retreieve_array','contracts_generated_permonth_final','contracts_generated_retreieve_array','leads_generated_permonth_final','leads_generated','page_title', 'page_description','action','logo','logoText'));

    }
}
