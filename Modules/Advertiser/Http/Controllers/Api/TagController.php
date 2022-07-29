<?php

namespace Modules\Advertiser\Http\Controllers\Api;

use App\Traits\APIResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Advertiser\Http\Requests\TagRequest;
use Modules\Advertiser\Services\TagService;
use Modules\Advertiser\Transformers\TagResource;
use function view;

class TagController extends Controller
{
    use APIResponse;
    public $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pageSize = $request->page_size ?? 12;
        $tags = $this->tagService->get($pageSize);

        return $this->sendResponse($tags);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TagRequest $request)
    {
        $tag = $this->tagService->store($request->validated());

        $data = new TagResource($tag);

        return $this->sendResponse($data, 'done created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $tag = $this->tagService->find($id);

        return $this->sendResponse(new TagResource($tag));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TagRequest $request, $id)
    {
        $tag = $this->tagService->update($request->validated(), $id);

        return $this->sendResponse(new TagResource($tag), 'done updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $tag = $this->tagService->delete($id);

        return $this->sendResponse($tag, 'done deleted successfully');
    }
}
