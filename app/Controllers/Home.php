<?php

namespace App\Controllers;

use App\Libraries\Api;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;

class Home extends BaseController
{
    public function index()
    {
        // $api = new Api();
        // $tes = $api->getData();

        $products = new Product();
        $data['products'] = Product::withRelations($products->orderBy('created_at', 'DESC')->findAll());

        foreach ($data['products'] as $product) {
            $product->created_at = date('d-m-Y', strtotime($product->created_at));
        }

        return view('index', $data);
    }

    public function form($id = null)
    {
        $categories = new Category();
        $status = new Status();

        $data['categories'] = $categories->findAll();
        $data['status'] = $status->findAll();

        if ($id != null) {
            $product = new Product();
            $data['product'] = $product->find($id);
        } else {
            $data['product'] = null;
        }

        return view('form', $data);
    }

    public function store($id = null)
    {
        helper(['form']);

        $data = new Product();

        $validationRules =    [
            'product_name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return view('form', [
                'validation' => $this->validator,
                'categories' => (new Category())->findAll(),
                'status' => (new Status())->findAll(),
                'product' => $id != null ? $data->find($id) : null
            ]);
        }

        $arr = [
            'product_name' => $this->request->getPost('product_name'),
            'price' => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category'),
            'status_id' => $this->request->getPost('status'),
        ];

        if ($id != null) {
            $data->update($id, $arr);
        } else {
            $data->save($arr);
        }

        $message = $id != null ? 'Product updated successfully' : 'Product add successfully';

        session()->setFlashdata('success', $message);

        return redirect()->to('/');
    }

    public function destroy()
    {
        $product = new Product();
        $product->delete($this->request->getPost('id_product'));

        session()->setFlashdata('success', 'Product deleted successfully');

        return redirect()->to('/');
    }
}
