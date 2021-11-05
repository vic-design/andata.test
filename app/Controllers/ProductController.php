<?php


namespace App\Controllers;


use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class ProductController
{
    /**
     * @param int $id
     * @param RouteCollection $routes
     */
    public function showAction(int $id, RouteCollection $routes): void
    {
        $product = new Product();
        $product->read($id);

        require_once APP_ROOT . '/views/product.php';
    }
}