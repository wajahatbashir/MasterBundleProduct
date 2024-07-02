<?php

namespace WB\MasterBundleProduct\Model;

use Magento\Bundle\Model\Product\Type as BundleType;

class CustomBundleProductType extends BundleType
{
    /**
     * {@inheritdoc}
     */
    public function canAddToCart($product, $request)
    {
        if ($product->getTypeId() == 'bundle' && $this->isChildBundleProduct($product)) {
            return true;
        }
        return parent::canAddToCart($product, $request);
    }

    /**
     * Check if a product is a child bundle product
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return bool
     */
    private function isChildBundleProduct($product)
    {
        // Logic to check if the product is a child bundle product
        return $product->getTypeId() == 'bundle';
    }
}
