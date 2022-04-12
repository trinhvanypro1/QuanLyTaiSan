<?php

namespace Modules\Baocao\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Baocao\Entities\Baocaonhaptaisan;
use Modules\Baocao\Http\Requests\CreateBaocaonhaptaisanRequest;
use Modules\Baocao\Http\Requests\UpdateBaocaonhaptaisanRequest;
use Modules\Baocao\Repositories\BaocaonhaptaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BaocaonhaptaisanController extends AdminBaseController
{
    /**
     * @var BaocaonhaptaisanRepository
     */
    private $baocaonhaptaisan;

    public function __construct(BaocaonhaptaisanRepository $baocaonhaptaisan)
    {
        parent::__construct();

        $this->baocaonhaptaisan = $baocaonhaptaisan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$baocaonhaptaisans = $this->baocaonhaptaisan->all();

        return view('baocao::admin.baocaonhaptaisans.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('baocao::admin.baocaonhaptaisans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBaocaonhaptaisanRequest $request
     * @return Response
     */
    public function store(CreateBaocaonhaptaisanRequest $request)
    {
        $this->baocaonhaptaisan->create($request->all());

        return redirect()->route('admin.baocao.baocaonhaptaisan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('baocao::baocaonhaptaisans.title.baocaonhaptaisans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Baocaonhaptaisan $baocaonhaptaisan
     * @return Response
     */
    public function edit(Baocaonhaptaisan $baocaonhaptaisan)
    {
        return view('baocao::admin.baocaonhaptaisans.edit', compact('baocaonhaptaisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Baocaonhaptaisan $baocaonhaptaisan
     * @param  UpdateBaocaonhaptaisanRequest $request
     * @return Response
     */
    public function update(Baocaonhaptaisan $baocaonhaptaisan, UpdateBaocaonhaptaisanRequest $request)
    {
        $this->baocaonhaptaisan->update($baocaonhaptaisan, $request->all());

        return redirect()->route('admin.baocao.baocaonhaptaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('baocao::baocaonhaptaisans.title.baocaonhaptaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Baocaonhaptaisan $baocaonhaptaisan
     * @return Response
     */
    public function destroy(Baocaonhaptaisan $baocaonhaptaisan)
    {
        $this->baocaonhaptaisan->destroy($baocaonhaptaisan);

        return redirect()->route('admin.baocao.baocaonhaptaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('baocao::baocaonhaptaisans.title.baocaonhaptaisans')]));
    }
}
