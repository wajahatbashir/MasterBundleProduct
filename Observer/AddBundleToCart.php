<?php

namespace WB\MasterBundleProduct\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Checkout\Model\Cart;

class AddBundleToCart implements ObserverInterface
{
    protected $productFactory;
    protected $cart;

    public function __construct(
        ProductFactory $productFactory,
        Cart $cart
    ) {
        $this->productFactory = $productFactory;
        $this->cart = $cart;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        
        // Check if the product is the virtual product
        if ($product->getSku() == 'your_virtual_product_sku') {
            // Load the main bundle product by SKU
            $mainBundleProductSku = 'your_main_bundle_product_sku';
            $bundleProduct = $this->productFactory->create()->loadByAttribute('sku', $mainBundleProductSku);

            if ($bundleProduct && $bundleProduct->getId()) {
                $params = [
                    'product' => $bundleProduct->getId(),
                    'qty' => 1
                ];
                try {
                    $this->cart->addProduct($bundleProduct, $params);
                    $this->cart->save();
                } catch (\Exception $e) {
                    // Handle exception
                }
            }
        }
    }
}
