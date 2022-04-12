<?php

namespace Modules\Danhmuc\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuc\Entities\Danhmucnhacungcap;
use Modules\Danhmuc\Http\Requests\CreateDanhmucnhacungcapRequest;
use Modules\Danhmuc\Http\Requests\UpdateDanhmucnhacungcapRequest;
use Modules\Danhmuc\Repositories\DanhmucnhacungcapRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DanhmucnhacungcapController extends AdminBaseController
{
    /**
     * @var DanhmucnhacungcapRepository
     */
    private $danhmucnhacungcap;

    public function __construct(DanhmucnhacungcapRepository $danhmucnhacungcap)
    {
        parent::__construct();

        $this->danhmucnhacungcap = $danhmucnhacungcap;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $danhmucnhacungcaps = $this->danhmucnhacungcap->all();

        return view('danhmuc::admin.danhmucnhacungcaps.index', compact('danhmucnhacungcaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array();
        do {
            $timestamp = mt_rand(0, 10000);
            $manhacungcap = 'NCC-'.date("ds").$timestamp;
         } while ( DB::table( 'danhmucnhacungcap' )->where( 'manhacungcap',$manhacungcap)->exists() );
        $data['manhacungcap']=$manhacungcap;
        return view('danhmuc::admin.danhmucnhacungcaps.create')->with('manhacungcap',$manhacungcap);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDanhmucnhacungcapRequest $request
     * @return Response
     */
    public function store(CreateDanhmucnhacungcapRequest $request)
    {
        $this->danhmucnhacungcap->create($request->all());

        return redirect()->route('admin.danhmuc.danhmucnhacungcap.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuc::danhmucnhacungcaps.title.danhmucnhacungcaps')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Danhmucnhacungcap $danhmucnhacungcap
     * @return Response
     */
    public function edit(Danhmucnhacungcap $danhmucnhacungcap)
    {
        return view('danhmuc::admin.danhmucnhacungcaps.edit', compact('danhmucnhacungcap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Danhmucnhacungcap $danhmucnhacungcap
     * @param  UpdateDanhmucnhacungcapRequest $request
     * @return Response
     */
    public function update(Danhmucnhacungcap $danhmucnhacungcap, UpdateDanhmucnhacungcapRequest $request)
    {
        $this->danhmucnhacungcap->update($danhmucnhacungcap, $request->all());

        return redirect()->route('admin.danhmuc.danhmucnhacungcap.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuc::danhmucnhacungcaps.title.danhmucnhacungcaps')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Danhmucnhacungcap $danhmucnhacungcap
     * @return Response
     */
    public function destroy(Danhmucnhacungcap $danhmucnhacungcap)
    {
        $this->danhmucnhacungcap->destroy($danhmucnhacungcap);

        return redirect()->route('admin.danhmuc.danhmucnhacungcap.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuc::danhmucnhacungcaps.title.danhmucnhacungcaps')]));
    }
}
