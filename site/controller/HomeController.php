<?php 
class HomeController {
    function index() {
        $productRepository = new ProductRepository();
        $conds = [];
        // sản phẩm nổi bật
        $sorts = [
            'featured' => 'DESC'
        ];
        $featuredProducts = $productRepository -> getBy($conds, $sorts, 1, 4);
        // sản phẩm mới nhất
        $sorts = [
            'created_date' => 'DESC'
        ];
        $latestProducts = $productRepository -> getBy($conds, $sorts, 1, 4);

        // lấy sản phẩm theo danh mục
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAll();
        foreach($categories as $category){
            $products = [
                $conds = [
                    'category_id'=>[
                        'type'=>'=',
                        'val'=>$category->getId()
                    ]
                ]
              
            ];
            $products = $productRepository->getBy($conds, $sorts, 1, 4);
            $categoryProducts[] = [
                'categoryName' => $category->getName(),
                'products' => $products
            ];

        }
       require 'view/home/index.php';
    }
}
?>