<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;
use CodeIgniter\RESTful\ResourceController;

class Product extends ResourceController
{
    protected $modelName = 'App\Models\Product_model';
    protected $format    = 'json';

    public function index()
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct();
        echo view('product_view',$data);
        // return $this->respond($this->model->findAll());
    }

    public function add_new()
    {
        echo view('add_product_view');
    }
    public function maxProducto()
	{
        $model = new Product_model();
         // $id = $model->maxProdutoModel();
        $id =  $model->select('max(product_id + 1) as product_id')->findAll();
		foreach ($id as $i)
		{
			if ($i['product_id'] == null)
			{
                return 1;
			}
			else
			{
                return $i['product_id'];
			}
		}
        // return $this->response->setJSON($result);
        // return $this->response->setJSON($id['product_id']);
	}
    public function save()
    {
        $model = new Product_model();
        $data = array(
            'product_id'=>$this->maxProducto(),
            'product_name'  => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
        );
        $model->saveProduct($data);
        return redirect()->to('/');
    }

    public function edit($id=null)
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct($id)->getRow();
        echo view('edit_product_view', $data);
        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
    }

    public function update($id=null)
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $data = array(
            'product_name'  => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
        );
        $model->updateProduct($data, $id);
        return redirect()->to('/');
    }

    public function delete($id=null)
    {
        $model = new Product_model();
        $model->deleteProduct($id);
        return redirect()->to('/');
    }
}
