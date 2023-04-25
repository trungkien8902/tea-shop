<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;

class ApiController extends Controller
{
    public function category()
    {
        $data = Category::orderBy('id', 'DESC')->get();
        $cate = CategoryResource::collection($data);
        return response()->json([
            'data' => $cate,
            'status_code' => 200,
            'message' => 'ok'
        ]);
    }
    public function detail($id)
    {
        $data = Category::find($id);
        $cate = new CategoryResource($data);
        return response()->json([
            'data' => $cate,
            'status_code' => 200,
            'message' => 'ok'
        ]);
    }
    public function product()
    {
        $product = Product::orderBy('id', 'DESC')->get();
        if($product)
        {
            return response()->json([
                'data' => $product,
                'status_code' => 200,
                'message' => 'ok'
            ]);
        }
        return response()->json([
            'data' => null,
            'status_code' => 404,
            'message' => 'data not found'
        ]);
    }

    public function addCate(Request $req)
    {
        $validate = Validator::make($req->all(),[
            'name' => 'required|unique:category'
        ],
        [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng'
        ]);
        
        if($validate->fails())
        {
            $hasError = $validate->errors();
            $errors = [];
            foreach($hasError->all() as $err){
                $errors[] = $err[0];
            }
            return response()->json([
                'data' => $errors,
                'status_code' => 404,
                'message' => 'Thêm mới không thành công'
            ]);
        }
        else {
            $data = $req->only('name', 'is_active');
            if($cate = Category::create($data))
            {
                return $this->apiResponse($cate, 200, true, 'Thêm mới thành công');
            }
            return $this->apiResponse();
        }
    }
    public function updateCate(Request $req)
    {
        $validate = Validator::make($req->all(),[
            'name' => 'required|unique:category'
        ],
        [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng'
        ]);
        
        if($validate->fails())
        {
            $hasError = $validate->errors();
            $errors = [];
            foreach($hasError->all() as $err){
                $errors[] = $err[0];
            }
            return response()->json([
                'data' => $errors,
                'status_code' => 404,
                'message' => 'Thêm mới không thành công'
            ]);
        }
        else {
            $data = $req->only('name', 'is_active');
            if($cate = Category::edit($data))
            {
                return $this->apiResponse($cate, 200, true, 'Cập nhật thành công');
            }
            return $this->apiResponse();
        }
    }

    public function delete($id)
    {
        $cate = Category::find($id);
        if($cate->products->count() == 0 && $cate->delete())
        {
            $this->apiResponse($cate, 200, true, 'Xóa danh mục thành công');
        }
        return $this->apiResponse();
    }

    public function apiResponse($data = null, $status = true, $code = 200, $message = null)
    {
        return response()->json([
            'data' => $data,
            'status_code' => $data == null ? 404 : $code,
            'status' => $status,
            'message' => $data == null && $message == null ? 'Không tìm thấy dữ liệu' : $message
        ]);
    }
}
