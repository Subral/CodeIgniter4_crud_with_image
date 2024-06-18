<?php
namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new ProductModel();    
    }

    public function index()
    {
        $data['products'] = $this->product->orderBy('product_id', 'ASC')->findAll();
        return view('products', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $imageName);
        } else {
            $imageName = null;
        }

        $data = [
            'product' => $this->request->getVar('product'),
            'category' => $this->request->getVar('category'),
            'price' => $this->request->getVar('price'),
            'id' => $this->request->getVar('id'),
            'model' => $this->request->getVar('model'),
            'image' => $imageName,
        ];

        $this->product->insert($data);
        return $this->response->redirect(site_url('/list'));
    }

    public function edit($product_id)
    {
        $data['product'] = $this->product->where('product_id', $product_id)->first();
        return $this->response->setJSON($data['product']);
    }

    public function update()
    {
        $product_id = $this->request->getVar('product_id');
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $imageName);
        } else {
            $imageName = $this->request->getVar('existing_image');
        }

        $data = [
            'product' => $this->request->getVar('product'),
            'category' => $this->request->getVar('category'),
            'price' => $this->request->getVar('price'),
            'id' => $this->request->getVar('id'),
            'model' => $this->request->getVar('model'),
            'image' => $imageName,
        ];

        $this->product->update($product_id, $data);
        return $this->response->redirect(site_url('/list'));
    }

    public function delete()
    {
        $id = $this->request->getVar('delete_id');
        $this->product->where('product_id', $id)->delete($id);
        return $this->response->redirect(site_url('/list'));
    }
}
