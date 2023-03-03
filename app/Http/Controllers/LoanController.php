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
        $query = $request->q;
        if ($query == 'loan'||$query == 'loss') {
            $labels ='';
            $dataLoan = [];
            $dataBack = [];
            if ($request->sortBy=='week') {
                $labels = [ 'Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', ];
                $start = Carbon::now()->startOfWeek()->format('Y-m-d');
                $expire =Carbon::now()->endOfWeek()->format('Y-m-d');
                $loans = $this->requestByWeek($start,$expire,$query == 'loan' ? 1: 3);
                $backs = $this->requestByWeek($start,$expire,$query == 'loan' ? 2: 4);

                $dataLoan=$dataBack = array_fill(0, 7, 0);

                foreach ($loans as $loan) {
                    $dataLoan[$loan->date] = $loan->total;
                }

                foreach ($backs as $back) {
                    $dataBack[$back->date] = $back->total;
                }
            }
            if ($request->sortBy=='subWeek') {
                $labels = [ 'Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', ];
                $start = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
                $expire =Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');
                $loans = $this->requestByWeek($start,$expire,$query == 'loan' ? 1: 3);
                $backs = $this->requestByWeek($start,$expire,$query == 'loan' ? 2: 4);

                $dataLoan=$dataBack = array_fill(0, 7, 0);

                foreach ($loans as $loan) {
                    $dataLoan[$loan->date] = $loan->total;
                }

                foreach ($backs as $back) {
                    $dataBack[$back->date] = $back->total;
                }
            }

            if ($request->sortBy=='month') {
                $daysInMonth = Carbon::now()->daysInMonth;
                $labels = range(1, $daysInMonth);

                $loans = $this->requestByMonth(Carbon::now()->month,Carbon::now()->year,$query == 'loan' ? 1: 3);
                $backs = $this->requestByMonth(Carbon::now()->month,Carbon::now()->year,$query == 'loan' ? 2: 4);

                $dataLoan=$dataBack = array_fill(0, $daysInMonth, 0);
                foreach ($loans as $loan) {
                    $dataLoan[(int)$loan->date-1] = $loan->total;
                }

                foreach ($backs as $back) {
                    $dataBack[(int)$back->date-1] = $back->total;
                }
            }

            if ($request->sortBy=='subMonth') {
                $daysInMonth = Carbon::now()->subMonth()->daysInMonth;
                $labels = range(1, $daysInMonth);

                $loans = $this->requestByMonth(Carbon::now()->subMonth()->month,Carbon::now()->year,$query == 'loan' ? 1: 3);
                $backs = $this->requestByMonth(Carbon::now()->subMonth()->month,Carbon::now()->year,$query == 'loan' ? 2: 4);

                $dataLoan=$dataBack = array_fill(0, $daysInMonth, 0);
                foreach ($loans as $loan) {
                    $dataLoan[(int)$loan->date-1] = $loan->total;
                }

                foreach ($backs as $back) {
                    $dataBack[(int)$back->date-1] = $back->total;
                }
            }

            if ($request->sortBy=='year') {
                $labels = ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6',
                'Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12',];

                $loans = $this->requestByYear(Carbon::now()->year,$query == 'loan' ? 1: 3);
                $backs = $this->requestByYear(Carbon::now()->year,$query == 'loan' ? 2: 4);

                $dataLoan=$dataBack = array_fill(0, 12, 0);
                foreach ($loans as $loan) {

                    $dataLoan[(int)$loan->date-1] = $loan->total;
                }

                foreach ($backs as $back) {

                    $dataBack[(int)$back->date-1] = $back->total;
                }

            }
            if ($request->sortBy=='all') {
                $labels = ['Tất cả'];

                $loans = $this->requestAll($query == 'loan' ? 1: 3);
                $backs = $this->requestAll($query == 'loan' ? 2: 4);

                foreach ($loans as $loan) {
                    $dataLoan[0] = $loan->total;
                }

                foreach ($backs as $back) {

                    $dataBack[0] = $back->total;
                }

            }
            $dataSet = [
                0=>[
                    'label'=>$query == 'loan' ?'Sách Mượn':'Hết Hạn',
                    'backgroundColor'=> $query == 'loan' ? '#0284BE':'#D97706',
                    'data'=> $dataLoan
                ],
                1=>[
                    'label'=>$query == 'loan' ?'Sách Trả':'Mất',
                    'backgroundColor'=> $query == 'loan' ?'#65A30D':'#DC2626',
                    'data' => $dataBack
                ]
            ];
            return response()->json([
                'data'=>[
                    'labels'=> $labels,
                    'datasets'=>$dataSet,
                ]
            ]);;

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
        DB::table('user_loan')->insert([
            'user_id'=> $request->user_id,
            'book_id'=> $request->book_id,
            'loan_id'=> 1,
            'start_time'=> Carbon::now(),
            'expired_time'=> Carbon::now()->addWeeks(2)
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
    public function update(Request $request, Loan $loan)
    {
        $loan ->update([
            'loan_id' => $request->loan_id
        ]);
        return new LoanResource($loan);
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

    public function requestByWeek($start,$expire,$status)
    {
        return DB::table('user_loan')
                ->select(DB::raw('DATE_FORMAT(expired_time,"%w") as date'), DB::raw('count(loan_id) as total'))
                ->whereBetween('expired_time', [$start, $expire])
                ->where('loan_id',$status)
                ->groupBy('date')
                ->get();

    }
    public function requestByMonth($month,$year,$status)
    {
        return DB::select(DB::raw("SELECT count(loan_id) as total, DATE_FORMAT(expired_time,'%e') as date FROM `user_loan`
        WHERE MONTH(expired_time)= $month AND loan_id = $status AND YEAR(expired_time)= $year
        GROUP By date"));
    }

    public function requestByYear($start,$status)
    {
        return DB::table('user_loan')
                ->select(DB::raw('DATE_FORMAT(expired_time,"%m") as date'), DB::raw('count(loan_id) as total'))
                ->whereYear('expired_time', $start)
                ->where('loan_id',$status)
                ->groupBy('date')
                ->get();
    }

    public function requestAll($status)
    {
        return DB::select(DB::raw("SELECT count(loan_id) as total FROM `user_loan`
        WHERE loan_id = $status"));
    }
}
