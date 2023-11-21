<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\CriteriaOnPriceModel;
use App\Models\DopCriteriaModel;
use App\Models\MainCriteriaModel;
use App\Models\PriceCriteriaModel;
use Illuminate\Http\Request;

class Criteria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('superadmin.criteria.index', [
            'main_criterias' => MainCriteriaModel::with(['dop_criteria.criteria_on_price'])->get(),
            'prices' => PriceCriteriaModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.criteria.create', [
            'main_criterias' => MainCriteriaModel::with(['dop_criteria.criteria_on_price'])->get(),
            'prices' => PriceCriteriaModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item = DopCriteriaModel::create([
            'name' => $request->input('name'),
            'main_criteria_id' => $request->input('main_criteria')
        ]);

        for ($i = 0; $i < count($request->input('price_id')); $i++) {
            CriteriaOnPriceModel::create([
                'dop_criteria_id' => $item->id,
                'criteria_price_id' => $request->input('price_id')[$i],
                'price' => $request->input('price')[$i] ?? 0,
            ]);
        }

        return redirect()->route('superadmin.criteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_criteria_main($id)
    {
        $main_criteria = MainCriteriaModel::find($id);

        return view('superadmin.criteria.update_criteria_main', ['main_criteria' => $main_criteria]);
    }

    public function store_update_criteria_main(Request $request){

        $main_criteria = MainCriteriaModel::find($request->input('id'));

        $main_criteria->name = $request->input('name');

        $main_criteria->save();

        return redirect()->route('superadmin.criteria.index');
    }

    public function update_criteria_dop($id)
    {
        $dop_criteria = DopCriteriaModel::with(['criteria_on_price'])->find($id);

        return view('superadmin.criteria.update_criteria_dop', [
            'main_criterias' => MainCriteriaModel::all(),
            'dop_criteria' => $dop_criteria,
            'prices' => PriceCriteriaModel::all()
        ]);
    }

    public function store_update_criteria_dop(Request $request){
        $item = DopCriteriaModel::find($request->input('id'));

        $item->name = $request->input('name');
        $item->main_criteria_id = $request->input('main_criteria');

        $item->save();

        for ($i = 0; $i < count($request->input('price_id')); $i++) {

            $item_price = CriteriaOnPriceModel::where('dop_criteria_id', '=', $item->id)
                ->where('criteria_price_id', '=', $request->input('price_id')[$i])->first();

            if ($item_price){

                $item_price->price = $request->input('price')[$i] ?? 0;

                $item_price->save();
            }else{
                CriteriaOnPriceModel::create([
                    'dop_criteria_id' => $item->id,
                    'criteria_price_id' => $request->input('price_id')[$i],
                    'price' => $request->input('price')[$i] ?? 0,
                ]);
            }
        }

        return redirect()->route('superadmin.criteria.index');
    }

    public function store_criteria_main(Request $request){

        MainCriteriaModel::create([
            'name' => $request->input('name')
        ]);

        return response()->json([
            'objects' => MainCriteriaModel::all()
        ]);
    }
}
