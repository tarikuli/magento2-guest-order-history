# magento2-guest-order-history
Magento 2 extension to implement guest order history feature.
Implement with a new controller that takes parameter(s) to query a single order 
and returns a json with information about order status, total, items (sku, item_id, price) and grand total. 
Use Born as namespace and OrderController as module name. (Born_OrderController)


<b>To install the module follow the steps:</b>

1. Merge the app directory to root directory. 

2. Run below commands:

php bin/magento cache:flush
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush

3. Use below URL structure to get the json data. 

http://[DOMAIN_NAME]/ordercontroller/guest/order/order_id/[ORDER_INCREMENT_ID]/

Note: email me at tarikuli@yahoo.com or tarikuli@gmail.com if you have any question. 
