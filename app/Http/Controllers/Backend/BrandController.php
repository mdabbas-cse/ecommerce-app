<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class BrandController extends Controller
{
    public function all()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.all', compact('brands'));
    }

    public function add()
    {
        return view('backend.brand.add');
    }

    public function store(Request $request, Brand $brand)
    {
        $validation = $request->validate([
            'brand_name_bn' => 'required',
            'brand_name_en' => 'required',
            'brand_photo' => 'required'
        ], [
            'brand_name_bn.required' => 'Brand name bangla required',
            'brand_name_en.required' => 'Brand name english required',
            'brand_photo.required' => 'Brand image required'
        ]);

        $brand_bn = $request->brand_name_bn;
        $brand_en = $request->brand_name_en;
        $image = $request->file('brand_photo');
        $newImageName = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        ImageManagerStatic::make($image)->resize(300, 300)->save('upload/brand/' . $newImageName);
        $path = 'upload/brand/' . $newImageName;

        $brand->brand_name_en = $brand_en;
        $brand->brand_slug_en = strtolower(str_replace(' ', '-', $brand_en));
        $brand->brand_name_bn = $brand_bn;
        $brand->brand_slug_bn = str_replace(' ', '-', $brand_bn);
        $brand->brand_photo = $path;
        $response = $brand->save();

        if ($response) {
            $notification = [
                'message' => 'Brand added successfully!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Someting was wrong!',
                'alert-type' => 'warning'
            ];
        }
        return redirect()->route('all.brand')->with($notification);
    }

    public function edit(Brand $brand, Request $request)
    {
        if (empty($request->id)) return redirect()->route('all.brand');
        $data = $brand->findOrfail($request->id);
        return view('backend.brand.edit', compact('data'));
    }

    public function update(Request $request, Brand $brand)
    {
        $id = $request->id;
        $data = $brand->findOrfail($id);

        $validation = $request->validate([
            'brand_name_bn' => 'required',
            'brand_name_en' => 'required',
        ], [
            'brand_name_bn.required' => 'Brand name bangla required',
            'brand_name_en.required' => 'Brand name english required'
        ]);

        $brand_bn = $request->brand_name_bn;
        $brand_en = $request->brand_name_en;
        $oldImage = $data->brand_photo;

        if ($request->file('brand_photo')) {
            $image = $request->file('brand_photo');
            $newImageName = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
            ImageManagerStatic::make($image)->resize(300, 300)->save('upload/brand/' . $newImageName);
            $path = 'upload/brand/' . $newImageName;
            $data->brand_photo = $path;
            @unlink(public_path($oldImage));
        }

        $data->brand_name_en = $brand_en;
        $data->brand_slug_en = strtolower(str_replace(' ', '-', $brand_en));
        $data->brand_name_bn = $brand_bn;
        $data->brand_slug_bn = str_replace(' ', '-', $brand_bn);
        $response = $data->save();

        if ($response) {
            $notification = [
                'message' => 'Brand update successfully!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Someting was wrong!',
                'alert-type' => 'warning'
            ];
        }
        return redirect()->route('all.brand')->with($notification);
    }

    public function delete($id)
    {
        dd($id);
    }
}
