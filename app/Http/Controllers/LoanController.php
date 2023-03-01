<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\LoanResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Carbon::create('3-1-2023')
        if ($request->q == 'week') {
            // $loan = Loan::whereBetween('start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            // $loan = Loan::whereDate('start_time','>',Carbon::now()->startOfWeek())->get();
            $loan = DB::table('user_loan')
            ->select(DB::raw('DATE(start_time) as start_time'), DB::raw('count(*) as views'))
            ->whereBetween('start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('start_time')
            ->get();
            return response()->json([
                $
            ]);
        }
        return LoanResource::collection(Loan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date= Carbon::now();
        $now = $date;
        $end = $date->addWeeks(2);
        DB::table('user_loan')->insert([
            'user_id'=> $request->user_id,
            'book_id'=> $request->book_id,
            'loan_id'=> 1,
            'start_time'=> $now,
            'expired_time'=> $end
        ]);
        return response()->json([
            'message' => 'Thêm thành công!',
            'status' => 201
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanRequest  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
