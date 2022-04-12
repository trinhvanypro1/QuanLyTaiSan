<?php

namespace Modules\Baocao\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Baocao\Entities\Baocaoxuattaisan;
use Modules\Baocao\Http\Requests\CreateBaocaoxuattaisanRequest;
use Modules\Baocao\Http\Requests\UpdateBaocaoxuattaisanRequest;
use Modules\Baocao\Repositories\BaocaoxuattaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BaocaoxuattaisanController extends AdminBaseController
{
    /**
     * @var BaocaoxuattaisanRepository
     */
    private $baocaoxuattaisan;

    public function __construct(BaocaoxuattaisanRepository $baocaoxuattaisan)
    {
        parent::__construct();

        $this->baocaoxuattaisan = $baocaoxuattaisan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$baocaoxuattaisans = $this->baocaoxuattaisan->all();

        return view('baocao::admin.baocaoxuattaisans.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('baocao::admin.baocaoxuattaisans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBaocaoxuattaisanRequest $request
     * @return Response
     */
    public function store(CreateBaocaoxuattaisanRequest $request)
    {
        $this->baocaoxuattaisan->create($request->all());

        return redirect()->route('admin.baocao.baocaoxuattaisan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('baocao::baocaoxuattaisans.title.baocaoxuattaisans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Baocaoxuattaisan $baocaoxuattaisan
     * @return Response
     */
    public function edit(Baocaoxuattaisan $baocaoxuattaisan)
    {
        return view('baocao::admin.baocaoxuattaisans.edit', compact('baocaoxuattaisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Baocaoxuattaisan $baocaoxuattaisan
     * @param  UpdateBaocaoxuattaisanRequest $request
     * @return Response
     */
    public function update(Baocaoxuattaisan $baocaoxuattaisan, UpdateBaocaoxuattaisanRequest $request)
    {
        $this->baocaoxuattaisan->update($baocaoxuattaisan, $request->all());

        return redirect()->route('admin.baocao.baocaoxuattaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('baocao::baocaoxuattaisans.title.baocaoxuattaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Baocaoxuattaisan $baocaoxuattaisan
     * @return Response
     */
    public function destroy(Baocaoxuattaisan $baocaoxuattaisan)
    {
        $this->baocaoxuattaisan->destroy($baocaoxuattaisan);

        return redirect()->route('admin.baocao.baocaoxuattaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('baocao::baocaoxuattaisans.title.baocaoxuattaisans')]));
    }
}
