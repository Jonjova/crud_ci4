<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class Product extends Controller
{
    public function index()
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct();
        echo view('product_view',$data);
    }

    public function add_new()
    {
        echo view('add_product_view');
    }
    public function maxProducto()
	{
        $model = new Product_model();
		$id = $model->maxProdutoModel();
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

    public function edit($id)
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct($id)->getRow();
        echo view('edit_product_view', $data);
        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
    }

    public function update()
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

    public function delete($id)
    {
        $model = new Product_model();
        $model->deleteProduct($id);
        return redirect()->to('/');
    }
}
