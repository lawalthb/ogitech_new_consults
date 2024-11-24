<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Statement;
use App\Models\User;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report_view');
    } // End Method


    public function OrderByProfit()
    {
        return view('backend.report.report_profit');
    } // End Method



    public function ReportOnline()
    {
        return view('backend.report.report_online_payment');
    } // End Method


    public function SearchByDate(Request $request)
    {

        $date = new DateTime($request->date);
$status = $_GET['status'] ?? 'confirm';
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatDate)->where('status', $status)->latest()->get();


        // Calculate the sum of the 'amount' column
        $totalAmount = $orders->sum('amount');


        return view('backend.report.report_by_date', compact('orders', 'formatDate', 'totalAmount'));
    } // End Method


    public function SearchByDateProfit(Request $request)
    {



        $profits = OrderItem::with('product')->whereBetween('created_at', [$request->from_date, $request->to_date])->get();

        $date_range = 'From: ' . $request->from_date . " To: " . $request->to_date;

        return view('backend.report.report_by_dateprofit', compact('profits', 'date_range'));
    } // End Method





    public function SearchByMonth(Request $request)
    {

        $month = $request->month;
        $status = $_GET['status'] ?? 'confirm';
        $year = $request->year_name;
        if ($year == "Open this select Year") {

            return "Please select Year";
        } else if ($year == "") {

            $month = $request->month ?? Carbon::now()->format('F');
            $year = $request->year_name ?? Carbon::now()->format('Y');
        }

        $orders = Order::where('order_month', $month)->where('order_year', $year)->where('status', $status)->latest()->get();

        // Calculate the sum of the 'amount' column
        $totalAmount = $orders->sum('amount');


        return view('backend.report.report_by_month', compact('orders', 'month', 'year', 'totalAmount'));
    } // End Method


    public function SearchByPending(Request $request)
    {

        $month = $request->month;
        $status = $_GET['status'] ?? 'pending';
        $year = $request->year_name;
        if ($year == "Open this select Year") {

            return "Please select Year";
        } else if ($year == "") {

            $month = $request->month ?? Carbon::now()->format('F');
            $year = $request->year_name ?? Carbon::now()->format('Y');
        }

        $orders = Order::where('order_month', $month)->where('order_year', $year)->where('status', $status)->latest()->get();

        // Calculate the sum of the 'amount' column
        $totalAmount = $orders->sum('amount');


        return view('backend.report.report_by_pending', compact('orders', 'month', 'year', 'totalAmount'));
    } // End Method



    public function SearchByYear(Request $request)
    {

        $year = $request->year ?? Carbon::now()->format('Y');
        $status = $_GET['status'] ?? 'confirm';
        $orders = Order::where('order_year', $year)->where('status', $status)->latest()->get();

        // Calculate the sum of the 'amount' column
        $totalAmount = $orders->sum('amount');

        return view('backend.report.report_by_year', compact('orders', 'year', 'totalAmount'));
    } // End Method


    public function OrderByUser()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('backend.report.report_by_user', compact('users'));
    } // End Method

    public function SearchByUser(Request $request)
    {
        $users = $request->user;
        $orders = Order::where('user_id', $users)->latest()->get();
        return view('backend.report.report_by_user_show', compact('orders', 'users'));
    } // End Method


    public function SearchByVendor(Request $request)
    {
        $username = User::where('id', $request->user)->value('name');

        $statements = Statement::with('user')->where('user_id', $request->user)->latest()->get();
        return view('backend.report.report_by_vendor_show', compact('statements',   'username'));
    } // End Method




    public function OrderByVendor()
    {
        $vendors = User::where('role', 'vendor')->orderBy('name', 'ASC')->get();
        return view('backend.report.report_by_vendor', compact('vendors'));
    } // End Method






    public function SearchByDatePayment(Request $request)
    {

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatDate)->where('status', '!=', 'pending')->latest()->get();
        $sumAmount = Order::where('order_date', $formatDate)->where('status', '!=', 'pending')->sum('amount');
        return view('backend.report.payment_report_by_date', compact('orders', 'formatDate', 'sumAmount'));
    } // End Method


    public function SearchByMonthPayment(Request $request)
    {

        $month = $request->month;
        $year = $request->year_name;

        $orders = Order::where('order_month', $month)->where('order_year', $year)->where('status', '!=', 'pending')->latest()->get();
        $sumAmount = Order::where('order_month', $month)->where('order_year', $year)->where('status', '!=', 'pending')->sum('amount');

        return view('backend.report.payment_report_by_month', compact('orders', 'month', 'year', 'sumAmount'));
    } // End Method


    public function SearchByYearPayment(Request $request)
    {

        $year = $request->year;

        $orders = Order::where('order_year', $year)->latest()->where('status', '!=', 'pending')->get();
        $sumAmount = Order::where('order_year', $year)->latest()->where('status', '!=', 'pending')->sum('amount');
        return view('backend.report.payment_report_by_year', compact('orders', 'year', 'sumAmount'));
    } // End Method

    public function AllPayment(Request $request)
    {

       // payment
$year ="ALL";
        $orders = Order::where('status', '!=', 'pending')->latest()->get();
        $sumAmount = Order::where('status', '!=', 'pending')->latest()->sum('amount');
        return view('backend.report.all_payment', compact('orders', 'year', 'sumAmount'));
    } // End Method
}
