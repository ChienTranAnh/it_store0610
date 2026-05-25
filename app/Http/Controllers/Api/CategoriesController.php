<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CategoriesController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $categories = $this->categoryService->allCategories();
            if (!$categories->count()) {
                return $this->success([], 'Don\'t have any categories');
            }

            return $this->success($categories->toArray());
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|MessageBag
     */
    public function store(Request $request)
    {
        // validate
        $validateData = validator($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ], [
            'name.required' => ':attribute is required',
            'name.min' => ':attribute must have minimum is 3 characters',
            'description.required' => ':attribute is required',
            'description.min' => ':attribute must have minimum is 5 characters',
        ], [
            'name' => 'Category name',
            'description' => 'Category description',
        ]);
        if ($validateData->fails()) {
            return $validateData->errors();
        }

        try {
            $category = $this->categoryService->create($request);
            if (!$category) {
                throw new \Exception('Create category failed!');
            }

            return $this->success($category);
        } catch (ModelNotFoundException $modelException) {
            logger($modelException->getMessage());
            return $this->notFound($modelException->getMessage());
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug)
    {
        try {
            $category = $this->categoryService->categoryDetail($slug);
            if (empty($category)) {
                return $this->notFound('Category not found!');
            };

            return $this->success($category);
        } catch (ModelNotFoundException $modelException) {
            logger($modelException->getMessage());
            return $this->notFound($modelException->getMessage());
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|MessageBag
     */
    public function update(Request $request, int $id)
    {
        // validate
        $validateData = validator($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ], [
            'name.required' => ':attribute is required',
            'name.min' => ':attribute must have minimum is 3 characters',
            'description.required' => ':attribute is required',
            'description.min' => ':attribute must have minimum is 5 characters',
        ], [
            'name' => 'Category name',
            'description' => 'Category description',
        ]);
        if ($validateData->fails()) {
            return $validateData->errors();
        }

        try {
            $categoryData = $this->categoryService->getCategory($id);

            return $this->success($this->categoryService->update($categoryData, $request), 'Update category success!');
        } catch (ModelNotFoundException $modelException) {
            logger($modelException->getMessage());
            return $this->notFound($modelException->getMessage());
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $categoryData = $this->categoryService->getCategory($id);
            if (!$categoryData->delete()) {
                throw new ModelNotFoundException('Category cannot be deleted!');
            }

            return $this->success($categoryData, 'Delete category success!');
        } catch (ModelNotFoundException $modelException) {
            logger($modelException->getMessage());
            return $this->notFound($modelException->getMessage());
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }
}
