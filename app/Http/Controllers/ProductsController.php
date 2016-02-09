<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller {

	private $productModel;

	public function __construct(product $productModel)
	{
		$this->productModel = $productModel;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->productModel->paginate(10);

		return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Category $category)
	{
		$categories = $category->lists('name','id');

		return view('products.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\ProductRequest $request)
	{
		$input = $request->all();

		$product = $this->productModel->fill($input);

		$product->save();

		return redirect()->route('products');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Category $category)
	{

		$categories = $category->lists('name','id');
		$product = $this->productModel->find($id);

		return view('products.edit', compact('product','categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\ProductRequest $request, $id)
	{
		$this->productModel->find($id)->update($request->all());

		return redirect()->route('products');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->productModel->find($id)->delete();

		return redirect()->route('products');
	}
        
        public function images($id) {
            $product = $this->productModel->find($id);
            
            return view('products.images', compact('product'));
        }
        
        public function createImage($id) {
            
            $product = $this->productModel->find($id);
            
            return view('products.create_image', compact('product'));
        }
        
        public function storeImage(\CodeCommerce\Http\Requests\ProductImageRequest $request, $id, \CodeCommerce\ProductImage $productImage) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            
            $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);
            
            Storage::disk('public_local')->put($image->id. '.' . $extension, \Illuminate\Support\Facades\File::get($file));
            
            return redirect()->route('products.images', ['id' => $id]);
        }
        
        public function destroyImage(\CodeCommerce\ProductImage $productImage, $id) {
            $image = $productImage->find($id);
            if(file_exists(public_path(). '/uploads/' . $image->id . '.' . $image->extension)){
                Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
            }
            
            $product = $image->product;
            $image->delete();
            
            return redirect()->route('products.images', [ 'id' => $product->id]);
        }

}
