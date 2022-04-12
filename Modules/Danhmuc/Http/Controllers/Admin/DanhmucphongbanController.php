<?php

namespace Modules\Danhmuc\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuc\Entities\Danhmucphongban;
use Modules\Danhmuc\Http\Requests\CreateDanhmucphongbanRequest;
use Modules\Danhmuc\Http\Requests\UpdateDanhmucphongbanRequest;
use Modules\Danhmuc\Repositories\DanhmucphongbanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DanhmucphongbanController extends AdminBaseController
{
    /**
     * @var DanhmucphongbanRepository
     */
    private $danhmucphongban;

    public function __construct(DanhmucphongbanRepository $danhmucphongban)
    {
        parent::__construct();

        $this->danhmucphongban = $danhmucphongban;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $danhmucphongbans = $this->danhmucphongban->all();

        return view('danhmuc::admin.danhmucphongbans.index', compact('danhmucphongbans'));
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
            $maphongban = 'PB-'.date("ds").$timestamp;
         } while ( DB::table( 'danhmucphongban' )->where( 'maphongban',$maphongban)->exists() );
        $data['maphongban']=$maphongban;
        return view('danhmuc::admin.danhmucphongbans.create')->with('maphongban',$maphongban);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDanhmucphongbanRequest $request
     * @return Response
     */
    public function store(CreateDanhmucphongbanRequest $request)
    {
        $this->danhmucphongban->create($request->all());

        return redirect()->route('admin.danhmuc.danhmucphongban.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuc::danhmucphongbans.title.danhmucphongbans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Danhmucphongban $danhmucphongban
     * @return Response
     */
    public function edit(Danhmucphongban $danhmucphongban)
    {
        return view('danhmuc::admin.danhmucphongbans.edit', compact('danhmucphongban'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Danhmucphongban $danhmucphongban
     * @param  UpdateDanhmucphongbanRequest $request
     * @return Response
     */
    public function update(Danhmucphongban $danhmucphongban, UpdateDanhmucphongbanRequest $request)
    {
        $this->danhmucphongban->update($danhmucphongban, $request->all());

        return redirect()->route('admin.danhmuc.danhmucphongban.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuc::danhmucphongbans.title.danhmucphongbans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Danhmucphongban $danhmucphongban
     * @return Response
     */
    public function destroy(Danhmucphongban $danhmucphongban)
    {
        $this->danhmucphongban->destroy($danhmucphongban);

        return redirect()->route('admin.danhmuc.danhmucphongban.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuc::danhmucphongbans.title.danhmucphongbans')]));
    }
}
