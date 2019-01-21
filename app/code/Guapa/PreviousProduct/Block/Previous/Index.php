<?php

namespace Guapa\PreviousProduct\Block\Previous;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $recentlyViewed;

    public function __construct (
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ProductFactory $productArr,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Reports\Block\Product\Viewed $recentlyViewed,
        array $data = []
    ) {
        $this->recentlyViewed    = $recentlyViewed;
        $this->productArr        = $productArr;
        $this->productRepository = $productRepository;
        parent::__construct( $context, $data );
    }

    // Function: Get product name by product ID
    public function getProduct($id) {
        return $this->productArr->create()->load($id);
    }
    
    // Function: Get product url by product ID
    public function getProductUrl($productId){
        $product = $this->productRepository->getById($productId);
        return $product->getUrlModel()->getUrl($product);
    }

    // Function: Get recently visited products
    public function getMostRecentlyViewed() {
        return $this->recentlyViewed->getItemsCollection()->getData();
    }
}