<?php

namespace Born\OrderController\Controller\Guest;

class Order extends \Magento\Framework\App\Action\Action
{
	protected $_orderFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Model\OrderFactory $orderFactory
    ) {
        parent::__construct($context);
        $this->_orderFactory = $orderFactory;
    }

    public function execute()
    {
    	$result = ['status' => 'ERROR', 'message' => __('Something went wrong while fatching order')];

    	$orderId = $this->getRequest()->getParam('order_id');

	    if ($orderId) {
    		$order = $this->_orderFactory->create();
	        $order->loadByIncrementId($orderId);

	        if($order->getId())
	        {
	        	$data = [
	        		'status' => $order->getData('status'),
	        		'subtotal' => $order->getData('status'),
	        		'grand_total' => $order->getData('grand_total')
	        	];

	        	foreach($order->getAllItems() as $item)
	        	{
					$data['items'][] = [
						'sku' => $item->getData('sku'),
						'item_id' => $item->getData('item_id'),
						'price' => $item->getData('price')
					];
	        	}

	        	$result = ['status' => 'SUCCESS', 'order' => $data];
	        }
	        else
	        {
	        	$result['message'] = __('Invalid increment Id');
	        }
	    }

        $resultJson = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        $resultJson->setData($result);
        return $resultJson;
    }
}
