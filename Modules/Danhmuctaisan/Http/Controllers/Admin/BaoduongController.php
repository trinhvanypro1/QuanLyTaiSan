<?php

namespace Modules\Danhmuctaisan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuctaisan\Entities\Baoduong;
use Modules\Danhmuctaisan\Http\Requests\CreateBaoduongRequest;
use Modules\Danhmuctaisan\Http\Requests\UpdateBaoduongRequest;
use Modules\Danhmuctaisan\Repositories\BaoduongRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BaoduongController extends AdminBaseController
{
    /**
     * @var BaoduongRepository
     */
    private $baoduong;

    public function __construct(BaoduongRepository $baoduong)
    {
        parent::__construct();

        $this->baoduong = $baoduong;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$baoduongs = $this->baoduong->all();

        return view('danhmuctaisan::admin.baoduongs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhmuctaisan::admin.baoduongs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBaoduongRequest $request
     * @return Response
     */
    public function store(CreateBaoduongRequest $request)
    {
        $this->baoduong->create($request->all());

        return redirect()->route('admin.danhmuctaisan.baoduong.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuctaisan::baoduongs.title.baoduongs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Baoduong $baoduong
     * @return Response
     */
    public function edit(Baoduong $baoduong)
    {
        return view('danhmuctaisan::admin.baoduongs.edit', compact('baoduong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Baoduong $baoduong
     * @param  UpdateBaoduongRequest $request
     * @return Response
     */
    public function update(Baoduong $baoduong, UpdateBaoduongRequest $request)
    {
        $this->baoduong->update($baoduong, $request->all());

        return redirect()->route('admin.danhmuctaisan.baoduong.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuctaisan::baoduongs.title.baoduongs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Baoduong $baoduong
     * @return Response
     */
    public function destroy(Baoduong $baoduong)
    {
        $this->baoduong->destroy($baoduong);

        return redirect()->route('admin.danhmuctaisan.baoduong.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuctaisan::baoduongs.title.baoduongs')]));
    }
}
