<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\CaptureOrderRequest;
use Google\Service\ShoppingContent\CaptureOrderResponse;
use Google\Service\ShoppingContent\Order;
use Google\Service\ShoppingContent\OrdersAcknowledgeRequest;
use Google\Service\ShoppingContent\OrdersAcknowledgeResponse;
use Google\Service\ShoppingContent\OrdersAdvanceTestOrderResponse;
use Google\Service\ShoppingContent\OrdersCancelLineItemRequest;
use Google\Service\ShoppingContent\OrdersCancelLineItemResponse;
use Google\Service\ShoppingContent\OrdersCancelRequest;
use Google\Service\ShoppingContent\OrdersCancelResponse;
use Google\Service\ShoppingContent\OrdersCancelTestOrderByCustomerRequest;
use Google\Service\ShoppingContent\OrdersCancelTestOrderByCustomerResponse;
use Google\Service\ShoppingContent\OrdersCreateTestOrderRequest;
use Google\Service\ShoppingContent\OrdersCreateTestOrderResponse;
use Google\Service\ShoppingContent\OrdersCreateTestReturnRequest;
use Google\Service\ShoppingContent\OrdersCreateTestReturnResponse;
use Google\Service\ShoppingContent\OrdersGetByMerchantOrderIdResponse;
use Google\Service\ShoppingContent\OrdersGetTestOrderTemplateResponse;
use Google\Service\ShoppingContent\OrdersInStoreRefundLineItemRequest;
use Google\Service\ShoppingContent\OrdersInStoreRefundLineItemResponse;
use Google\Service\ShoppingContent\OrdersListResponse;
use Google\Service\ShoppingContent\OrdersRefundItemRequest;
use Google\Service\ShoppingContent\OrdersRefundItemResponse;
use Google\Service\ShoppingContent\OrdersRefundOrderRequest;
use Google\Service\ShoppingContent\OrdersRefundOrderResponse;
use Google\Service\ShoppingContent\OrdersRejectReturnLineItemRequest;
use Google\Service\ShoppingContent\OrdersRejectReturnLineItemResponse;
use Google\Service\ShoppingContent\OrdersReturnRefundLineItemRequest;
use Google\Service\ShoppingContent\OrdersReturnRefundLineItemResponse;
use Google\Service\ShoppingContent\OrdersSetLineItemMetadataRequest;
use Google\Service\ShoppingContent\OrdersSetLineItemMetadataResponse;
use Google\Service\ShoppingContent\OrdersShipLineItemsRequest;
use Google\Service\ShoppingContent\OrdersShipLineItemsResponse;
use Google\Service\ShoppingContent\OrdersUpdateLineItemShippingDetailsRequest;
use Google\Service\ShoppingContent\OrdersUpdateLineItemShippingDetailsResponse;
use Google\Service\ShoppingContent\OrdersUpdateMerchantOrderIdRequest;
use Google\Service\ShoppingContent\OrdersUpdateMerchantOrderIdResponse;
use Google\Service\ShoppingContent\OrdersUpdateShipmentRequest;
use Google\Service\ShoppingContent\OrdersUpdateShipmentResponse;

/**
 * The "orders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $orders = $contentService->orders;
 *  </code>
 */
class Orders extends \Google\Service\Resource
{
  /**
   * Marks an order as acknowledged. (orders.acknowledge)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersAcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersAcknowledgeResponse
   */
  public function acknowledge($merchantId, $orderId, OrdersAcknowledgeRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', [$params], OrdersAcknowledgeResponse::class);
  }
  /**
   * Sandbox only. Moves a test order from state "`inProgress`" to state
   * "`pendingShipment`". (orders.advancetestorder)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the test order to modify.
   * @param array $optParams Optional parameters.
   * @return OrdersAdvanceTestOrderResponse
   */
  public function advancetestorder($merchantId, $orderId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId];
    $params = array_merge($params, $optParams);
    return $this->call('advancetestorder', [$params], OrdersAdvanceTestOrderResponse::class);
  }
  /**
   * Cancels all line items in an order, making a full refund. (orders.cancel)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order to cancel.
   * @param OrdersCancelRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersCancelResponse
   */
  public function cancel($merchantId, $orderId, OrdersCancelRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], OrdersCancelResponse::class);
  }
  /**
   * Cancels a line item, making a full refund. (orders.cancellineitem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersCancelLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersCancelLineItemResponse
   */
  public function cancellineitem($merchantId, $orderId, OrdersCancelLineItemRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancellineitem', [$params], OrdersCancelLineItemResponse::class);
  }
  /**
   * Sandbox only. Cancels a test order for customer-initiated cancellation.
   * (orders.canceltestorderbycustomer)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the test order to cancel.
   * @param OrdersCancelTestOrderByCustomerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersCancelTestOrderByCustomerResponse
   */
  public function canceltestorderbycustomer($merchantId, $orderId, OrdersCancelTestOrderByCustomerRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('canceltestorderbycustomer', [$params], OrdersCancelTestOrderByCustomerResponse::class);
  }
  /**
   * Capture funds from the customer for the current order total. This method
   * should be called after the merchant verifies that they are able and ready to
   * start shipping the order. This method blocks until a response is received
   * from the payment processsor. If this method succeeds, the merchant is
   * guaranteed to receive funds for the order after shipment. If the request
   * fails, it can be retried or the order may be cancelled. This method cannot be
   * called after the entire order is already shipped. A rejected error code is
   * returned when the payment service provider has declined the charge. This
   * indicates a problem between the PSP and either the merchant's or customer's
   * account. Sometimes this error will be resolved by the customer. We recommend
   * retrying these errors once per day or cancelling the order with reason
   * `failedToCaptureFunds` if the items cannot be held. (orders.captureOrder)
   *
   * @param string $merchantId Required. The ID of the account that manages the
   * order. This cannot be a multi-client account.
   * @param string $orderId Required. The ID of the Order.
   * @param CaptureOrderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CaptureOrderResponse
   */
  public function captureOrder($merchantId, $orderId, CaptureOrderRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('captureOrder', [$params], CaptureOrderResponse::class);
  }
  /**
   * Sandbox only. Creates a test order. (orders.createtestorder)
   *
   * @param string $merchantId The ID of the account that should manage the order.
   * This cannot be a multi-client account.
   * @param OrdersCreateTestOrderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersCreateTestOrderResponse
   */
  public function createtestorder($merchantId, OrdersCreateTestOrderRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createtestorder', [$params], OrdersCreateTestOrderResponse::class);
  }
  /**
   * Sandbox only. Creates a test return. (orders.createtestreturn)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersCreateTestReturnRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersCreateTestReturnResponse
   */
  public function createtestreturn($merchantId, $orderId, OrdersCreateTestReturnRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createtestreturn', [$params], OrdersCreateTestReturnResponse::class);
  }
  /**
   * Retrieves an order from your Merchant Center account. (orders.get)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param array $optParams Optional parameters.
   * @return Order
   */
  public function get($merchantId, $orderId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Order::class);
  }
  /**
   * Retrieves an order using merchant order ID. (orders.getbymerchantorderid)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $merchantOrderId The merchant order ID to be looked for.
   * @param array $optParams Optional parameters.
   * @return OrdersGetByMerchantOrderIdResponse
   */
  public function getbymerchantorderid($merchantId, $merchantOrderId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'merchantOrderId' => $merchantOrderId];
    $params = array_merge($params, $optParams);
    return $this->call('getbymerchantorderid', [$params], OrdersGetByMerchantOrderIdResponse::class);
  }
  /**
   * Sandbox only. Retrieves an order template that can be used to quickly create
   * a new order in sandbox. (orders.gettestordertemplate)
   *
   * @param string $merchantId The ID of the account that should manage the order.
   * This cannot be a multi-client account.
   * @param string $templateName The name of the template to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string country The country of the template to retrieve. Defaults
   * to `US`.
   * @return OrdersGetTestOrderTemplateResponse
   */
  public function gettestordertemplate($merchantId, $templateName, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'templateName' => $templateName];
    $params = array_merge($params, $optParams);
    return $this->call('gettestordertemplate', [$params], OrdersGetTestOrderTemplateResponse::class);
  }
  /**
   * Deprecated. Notifies that item return and refund was handled directly by
   * merchant outside of Google payments processing (e.g. cash refund done in
   * store). Note: We recommend calling the returnrefundlineitem method to refund
   * in-store returns. We will issue the refund directly to the customer. This
   * helps to prevent possible differences arising between merchant and Google
   * transaction records. We also recommend having the point of sale system
   * communicate with Google to ensure that customers do not receive a double
   * refund by first refunding via Google then via an in-store return.
   * (orders.instorerefundlineitem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersInStoreRefundLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersInStoreRefundLineItemResponse
   */
  public function instorerefundlineitem($merchantId, $orderId, OrdersInStoreRefundLineItemRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('instorerefundlineitem', [$params], OrdersInStoreRefundLineItemResponse::class);
  }
  /**
   * Lists the orders in your Merchant Center account. (orders.listOrders)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acknowledged Obtains orders that match the acknowledgement
   * status. When set to true, obtains orders that have been acknowledged. When
   * false, obtains orders that have not been acknowledged. We recommend using
   * this filter set to `false`, in conjunction with the `acknowledge` call, such
   * that only un-acknowledged orders are returned.
   * @opt_param string maxResults The maximum number of orders to return in the
   * response, used for paging. The default value is 25 orders per page, and the
   * maximum allowed value is 250 orders per page.
   * @opt_param string orderBy Order results by placement date in descending or
   * ascending order. Acceptable values are: - placedDateAsc - placedDateDesc
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string placedDateEnd Obtains orders placed before this date
   * (exclusively), in ISO 8601 format.
   * @opt_param string placedDateStart Obtains orders placed after this date
   * (inclusively), in ISO 8601 format.
   * @opt_param string statuses Obtains orders that match any of the specified
   * statuses. Please note that `active` is a shortcut for `pendingShipment` and
   * `partiallyShipped`, and `completed` is a shortcut for `shipped`,
   * `partiallyDelivered`, `delivered`, `partiallyReturned`, `returned`, and
   * `canceled`.
   * @return OrdersListResponse
   */
  public function listOrders($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], OrdersListResponse::class);
  }
  /**
   * Issues a partial or total refund for items and shipment. (orders.refunditem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order to refund.
   * @param OrdersRefundItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersRefundItemResponse
   */
  public function refunditem($merchantId, $orderId, OrdersRefundItemRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('refunditem', [$params], OrdersRefundItemResponse::class);
  }
  /**
   * Issues a partial or total refund for an order. (orders.refundorder)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order to refund.
   * @param OrdersRefundOrderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersRefundOrderResponse
   */
  public function refundorder($merchantId, $orderId, OrdersRefundOrderRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('refundorder', [$params], OrdersRefundOrderResponse::class);
  }
  /**
   * Rejects return on an line item. (orders.rejectreturnlineitem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersRejectReturnLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersRejectReturnLineItemResponse
   */
  public function rejectreturnlineitem($merchantId, $orderId, OrdersRejectReturnLineItemRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rejectreturnlineitem', [$params], OrdersRejectReturnLineItemResponse::class);
  }
  /**
   * Returns and refunds a line item. Note that this method can only be called on
   * fully shipped orders. Please also note that the Orderreturns API is the
   * preferred way to handle returns after you receive a return from a customer.
   * You can use Orderreturns.list or Orderreturns.get to search for the return,
   * and then use Orderreturns.processreturn to issue the refund. If the return
   * cannot be found, then we recommend using this API to issue a refund.
   * (orders.returnrefundlineitem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersReturnRefundLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersReturnRefundLineItemResponse
   */
  public function returnrefundlineitem($merchantId, $orderId, OrdersReturnRefundLineItemRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('returnrefundlineitem', [$params], OrdersReturnRefundLineItemResponse::class);
  }
  /**
   * Sets (or overrides if it already exists) merchant provided annotations in the
   * form of key-value pairs. A common use case would be to supply us with
   * additional structured information about a line item that cannot be provided
   * via other methods. Submitted key-value pairs can be retrieved as part of the
   * orders resource. (orders.setlineitemmetadata)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersSetLineItemMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersSetLineItemMetadataResponse
   */
  public function setlineitemmetadata($merchantId, $orderId, OrdersSetLineItemMetadataRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setlineitemmetadata', [$params], OrdersSetLineItemMetadataResponse::class);
  }
  /**
   * Marks line item(s) as shipped. (orders.shiplineitems)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersShipLineItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersShipLineItemsResponse
   */
  public function shiplineitems($merchantId, $orderId, OrdersShipLineItemsRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('shiplineitems', [$params], OrdersShipLineItemsResponse::class);
  }
  /**
   * Updates ship by and delivery by dates for a line item.
   * (orders.updatelineitemshippingdetails)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersUpdateLineItemShippingDetailsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersUpdateLineItemShippingDetailsResponse
   */
  public function updatelineitemshippingdetails($merchantId, $orderId, OrdersUpdateLineItemShippingDetailsRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatelineitemshippingdetails', [$params], OrdersUpdateLineItemShippingDetailsResponse::class);
  }
  /**
   * Updates the merchant order ID for a given order.
   * (orders.updatemerchantorderid)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersUpdateMerchantOrderIdRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersUpdateMerchantOrderIdResponse
   */
  public function updatemerchantorderid($merchantId, $orderId, OrdersUpdateMerchantOrderIdRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatemerchantorderid', [$params], OrdersUpdateMerchantOrderIdResponse::class);
  }
  /**
   * Updates a shipment's status, carrier, and/or tracking ID.
   * (orders.updateshipment)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param OrdersUpdateShipmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return OrdersUpdateShipmentResponse
   */
  public function updateshipment($merchantId, $orderId, OrdersUpdateShipmentRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateshipment', [$params], OrdersUpdateShipmentResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Orders::class, 'Google_Service_ShoppingContent_Resource_Orders');
