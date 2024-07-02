# WB_MasterBundleProduct

**Description:**

The WB_MasterBundleProduct module for Magento 2 allows you to link a main bundle product with a virtual product. When the virtual product is added to the cart, the main bundle product, which can contain multiple bundle products, is automatically added as well. This functionality is useful for scenarios where you want to offer complex product configurations under a single virtual product wrapper.

**Features:**
- Supports Magento 2.3 and 2.4.
- Allows creation of a main bundle product containing multiple bundle products.
- Automatically adds the main bundle product to the cart when the associated virtual product is added.
- Simplifies the purchasing process for complex product combinations.

**Installation Instructions:**

1. Copy the module files to `app/code/WB/MasterBundleProduct`.
2. Run the following commands from the Magento root directory:

```bash
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
