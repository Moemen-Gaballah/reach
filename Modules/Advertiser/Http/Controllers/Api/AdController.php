<?php

namespace Modules\Advertiser\Http\Controllers\Api;

use App\Traits\APIResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Advertiser\Http\Requests\AdRequest;
use Modules\Advertiser\Services\AdService;
use Modules\Advertiser\Transformers\AdResource;
use function view;

class AdController extends Controller
{
    use APIResponse;
    public $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 12;
        $ads = $this->adService->get($pageSize);

        return $this->sendResponse($ads);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdRequest $request)
    {
        $ad = $this->adService->store($request->validated());

        $data = new AdResource($ad);

        return $this->sendResponse($data, 'done created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function getAdsByAdvertiserId($id)
    {
        $ads = $this->adService->getAdsByAdvertiserId($id);

        return $this->sendResponse($ads);
    }


}
