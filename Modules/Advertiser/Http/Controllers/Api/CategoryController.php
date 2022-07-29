<?php

namespace Modules\Advertiser\Http\Controllers\Api;

use App\Traits\APIResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Advertiser\Http\Requests\CategoryRequest;
use Modules\Advertiser\Services\CategoryService;
use Modules\Advertiser\Transformers\CategoryResource;
use function view;

class CategoryController extends Controller
{
    use APIResponse;
    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 12;
        $categories = $this->categoryService->get($pageSize);

        return $this->sendResponse($categories);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request->validated());

        $data = new CategoryResource($category);

        return $this->sendResponse($data, 'done created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $category = $this->categoryService->find($id);

        return $this->sendResponse(new CategoryResource($category));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryService->update($request->validated(), $id);
        $data = new CategoryResource($category);

        return $this->sendResponse($data, 'done updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $category = $this->categoryService->delete($id);

        return $this->sendResponse($category, 'done deleted successfully');
    }
}
