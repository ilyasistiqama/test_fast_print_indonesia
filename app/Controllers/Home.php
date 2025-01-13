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
        $products = new Product();
        $paginate = 10;

        $data['products'] = Product::withRelations($products->where('status_id', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate($paginate));

        foreach ($data['products'] as $product) {
            $product->created_at = date('d-m-Y', strtotime($product->created_at));
            $product->synced_at = $product->synced_at != null ? date('d-m-Y', strtotime($product->synced_at)) : '-';
        }

        $data['pager'] = $products->pager;
        $data['page'] = $this->request->getGet('page');
        $data['paginate'] = $paginate;

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

    public function sync()
    {
        $api = new Api();
        $response = json_decode($api->getData());
        if ($response->error == 0) {
            $product = new Product();
            $product->where('synced_at IS NOT NULL')->delete();

            foreach ($response->data as $data) {
                $category = new Category();
                $status = new Status();
                $product = new Product();

                if ($category->where('category_name', $data->kategori)->first() == null) {
                    $category->save(['category_name' => $data->kategori]);
                }

                if ($status->where('status_name', $data->status)->first() == null) {
                    $status->save(['status_name' => $data->status]);
                }

                $product->save([
                    'product_name' => $data->nama_produk,
                    'price' => $data->harga,
                    'category_id' => $category->where('category_name', $data->kategori)->first()->id_category,
                    'status_id' => $status->where('status_name', $data->status)->first()->id_status,
                    'synced_at' => date('Y-m-d H:i:s')
                ]);
            }


            session()->setFlashdata('success', 'Synced successfully');

            return redirect()->to('/');
        } else {
            session()->setFlashdata('error', 'Sync Failed. ' . $response->ket);

            return redirect()->to('/');
        }
    }
}
