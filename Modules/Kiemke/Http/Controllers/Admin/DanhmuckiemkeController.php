<?php

namespace Modules\Kiemke\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Kiemke\Entities\Danhmuckiemke;
use Modules\Kiemke\Http\Requests\CreateDanhmuckiemkeRequest;
use Modules\Kiemke\Http\Requests\UpdateDanhmuckiemkeRequest;
use Modules\Kiemke\Repositories\DanhmuckiemkeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DanhmuckiemkeController extends AdminBaseController
{
    /**
     * @var DanhmuckiemkeRepository
     */
    private $danhmuckiemke;

    public function __construct(DanhmuckiemkeRepository $danhmuckiemke)
    {
        parent::__construct();

        $this->danhmuckiemke = $danhmuckiemke;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$danhmuckiemkes = $this->danhmuckiemke->all();

        return view('kiemke::admin.danhmuckiemkes.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('kiemke::admin.danhmuckiemkes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDanhmuckiemkeRequest $request
     * @return Response
     */
    public function store(CreateDanhmuckiemkeRequest $request)
    {
        $this->danhmuckiemke->create($request->all());

        return redirect()->route('admin.kiemke.danhmuckiemke.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('kiemke::danhmuckiemkes.title.danhmuckiemkes')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Danhmuckiemke $danhmuckiemke
     * @return Response
     */
    public function edit(Danhmuckiemke $danhmuckiemke)
    {
        return view('kiemke::admin.danhmuckiemkes.edit', compact('danhmuckiemke'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Danhmuckiemke $danhmuckiemke
     * @param  UpdateDanhmuckiemkeRequest $request
     * @return Response
     */
    public function update(Danhmuckiemke $danhmuckiemke, UpdateDanhmuckiemkeRequest $request)
    {
        $this->danhmuckiemke->update($danhmuckiemke, $request->all());

        return redirect()->route('admin.kiemke.danhmuckiemke.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('kiemke::danhmuckiemkes.title.danhmuckiemkes')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Danhmuckiemke $danhmuckiemke
     * @return Response
     */
    public function destroy(Danhmuckiemke $danhmuckiemke)
    {
        $this->danhmuckiemke->destroy($danhmuckiemke);

        return redirect()->route('admin.kiemke.danhmuckiemke.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('kiemke::danhmuckiemkes.title.danhmuckiemkes')]));
    }
}
