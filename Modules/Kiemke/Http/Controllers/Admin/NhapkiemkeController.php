<?php

namespace Modules\Kiemke\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Kiemke\Entities\Nhapkiemke;
use Modules\Kiemke\Http\Requests\CreateNhapkiemkeRequest;
use Modules\Kiemke\Http\Requests\UpdateNhapkiemkeRequest;
use Modules\Kiemke\Repositories\NhapkiemkeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class NhapkiemkeController extends AdminBaseController
{
    /**
     * @var NhapkiemkeRepository
     */
    private $nhapkiemke;

    public function __construct(NhapkiemkeRepository $nhapkiemke)
    {
        parent::__construct();

        $this->nhapkiemke = $nhapkiemke;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$nhapkiemkes = $this->nhapkiemke->all();

        return view('kiemke::admin.nhapkiemkes.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('kiemke::admin.nhapkiemkes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNhapkiemkeRequest $request
     * @return Response
     */
    public function store(CreateNhapkiemkeRequest $request)
    {
        $this->nhapkiemke->create($request->all());

        return redirect()->route('admin.kiemke.nhapkiemke.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('kiemke::nhapkiemkes.title.nhapkiemkes')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Nhapkiemke $nhapkiemke
     * @return Response
     */
    public function edit(Nhapkiemke $nhapkiemke)
    {
        return view('kiemke::admin.nhapkiemkes.edit', compact('nhapkiemke'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Nhapkiemke $nhapkiemke
     * @param  UpdateNhapkiemkeRequest $request
     * @return Response
     */
    public function update(Nhapkiemke $nhapkiemke, UpdateNhapkiemkeRequest $request)
    {
        $this->nhapkiemke->update($nhapkiemke, $request->all());

        return redirect()->route('admin.kiemke.nhapkiemke.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('kiemke::nhapkiemkes.title.nhapkiemkes')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Nhapkiemke $nhapkiemke
     * @return Response
     */
    public function destroy(Nhapkiemke $nhapkiemke)
    {
        $this->nhapkiemke->destroy($nhapkiemke);

        return redirect()->route('admin.kiemke.nhapkiemke.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('kiemke::nhapkiemkes.title.nhapkiemkes')]));
    }
}
