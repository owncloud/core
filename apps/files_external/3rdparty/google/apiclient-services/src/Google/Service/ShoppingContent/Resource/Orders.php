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

/**
 * The "orders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $orders = $contentService->orders;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Orders extends Google_Service_Resource
{
  /**
   * Marks an order as acknowledged. (orders.acknowledge)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersAcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersAcknowledgeResponse
   */
  public function acknowledge($merchantId, $orderId, Google_Service_ShoppingContent_OrdersAcknowledgeRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', array($params), "Google_Service_ShoppingContent_OrdersAcknowledgeResponse");
  }
  /**
   * Sandbox only. Moves a test order from state "`inProgress`" to state
   * "`pendingShipment`". (orders.advancetestorder)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the test order to modify.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersAdvanceTestOrderResponse
   */
  public function advancetestorder($merchantId, $orderId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId);
    $params = array_merge($params, $optParams);
    return $this->call('advancetestorder', array($params), "Google_Service_ShoppingContent_OrdersAdvanceTestOrderResponse");
  }
  /**
   * Cancels all line items in an order, making a full refund. (orders.cancel)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order to cancel.
   * @param Google_Service_ShoppingContent_OrdersCancelRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersCancelResponse
   */
  public function cancel($merchantId, $orderId, Google_Service_ShoppingContent_OrdersCancelRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_ShoppingContent_OrdersCancelResponse");
  }
  /**
   * Cancels a line item, making a full refund. (orders.cancellineitem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersCancelLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersCancelLineItemResponse
   */
  public function cancellineitem($merchantId, $orderId, Google_Service_ShoppingContent_OrdersCancelLineItemRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancellineitem', array($params), "Google_Service_ShoppingContent_OrdersCancelLineItemResponse");
  }
  /**
   * Sandbox only. Cancels a test order for customer-initiated cancellation.
   * (orders.canceltestorderbycustomer)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the test order to cancel.
   * @param Google_Service_ShoppingContent_OrdersCancelTestOrderByCustomerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersCancelTestOrderByCustomerResponse
   */
  public function canceltestorderbycustomer($merchantId, $orderId, Google_Service_ShoppingContent_OrdersCancelTestOrderByCustomerRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('canceltestorderbycustomer', array($params), "Google_Service_ShoppingContent_OrdersCancelTestOrderByCustomerResponse");
  }
  /**
   * Sandbox only. Creates a test order. (orders.createtestorder)
   *
   * @param string $merchantId The ID of the account that should manage the order.
   * This cannot be a multi-client account.
   * @param Google_Service_ShoppingContent_OrdersCreateTestOrderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersCreateTestOrderResponse
   */
  public function createtestorder($merchantId, Google_Service_ShoppingContent_OrdersCreateTestOrderRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createtestorder', array($params), "Google_Service_ShoppingContent_OrdersCreateTestOrderResponse");
  }
  /**
   * Sandbox only. Creates a test return. (orders.createtestreturn)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersCreateTestReturnRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersCreateTestReturnResponse
   */
  public function createtestreturn($merchantId, $orderId, Google_Service_ShoppingContent_OrdersCreateTestReturnRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createtestreturn', array($params), "Google_Service_ShoppingContent_OrdersCreateTestReturnResponse");
  }
  /**
   * Retrieves an order from your Merchant Center account. (orders.get)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Order
   */
  public function get($merchantId, $orderId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_Order");
  }
  /**
   * Retrieves an order using merchant order ID. (orders.getbymerchantorderid)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $merchantOrderId The merchant order ID to be looked for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersGetByMerchantOrderIdResponse
   */
  public function getbymerchantorderid($merchantId, $merchantOrderId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'merchantOrderId' => $merchantOrderId);
    $params = array_merge($params, $optParams);
    return $this->call('getbymerchantorderid', array($params), "Google_Service_ShoppingContent_OrdersGetByMerchantOrderIdResponse");
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
   * @return Google_Service_ShoppingContent_OrdersGetTestOrderTemplateResponse
   */
  public function gettestordertemplate($merchantId, $templateName, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'templateName' => $templateName);
    $params = array_merge($params, $optParams);
    return $this->call('gettestordertemplate', array($params), "Google_Service_ShoppingContent_OrdersGetTestOrderTemplateResponse");
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
   * @param Google_Service_ShoppingContent_OrdersInStoreRefundLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersInStoreRefundLineItemResponse
   */
  public function instorerefundlineitem($merchantId, $orderId, Google_Service_ShoppingContent_OrdersInStoreRefundLineItemRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('instorerefundlineitem', array($params), "Google_Service_ShoppingContent_OrdersInStoreRefundLineItemResponse");
  }
  /**
   * Lists the orders in your Merchant Center account. (orders.listOrders)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Order results by placement date in descending or
   * ascending order. Acceptable values are: - placedDateAsc - placedDateDesc
   * @opt_param string placedDateEnd Obtains orders placed before this date
   * (exclusively), in ISO 8601 format.
   * @opt_param bool acknowledged Obtains orders that match the acknowledgement
   * status. When set to true, obtains orders that have been acknowledged. When
   * false, obtains orders that have not been acknowledged. We recommend using
   * this filter set to `false`, in conjunction with the `acknowledge` call, such
   * that only un-acknowledged orders are returned.
   * @opt_param string maxResults The maximum number of orders to return in the
   * response, used for paging. The default value is 25 orders per page, and the
   * maximum allowed value is 250 orders per page.
   * @opt_param string placedDateStart Obtains orders placed after this date
   * (inclusively), in ISO 8601 format.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string statuses Obtains orders that match any of the specified
   * statuses. Please note that `active` is a shortcut for `pendingShipment` and
   * `partiallyShipped`, and `completed` is a shortcut for `shipped`,
   * `partiallyDelivered`, `delivered`, `partiallyReturned`, `returned`, and
   * `canceled`.
   * @return Google_Service_ShoppingContent_OrdersListResponse
   */
  public function listOrders($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_OrdersListResponse");
  }
  /**
   * Issues a partial or total refund for items and shipment. (orders.refunditem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order to refund.
   * @param Google_Service_ShoppingContent_OrdersRefundItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersRefundItemResponse
   */
  public function refunditem($merchantId, $orderId, Google_Service_ShoppingContent_OrdersRefundItemRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('refunditem', array($params), "Google_Service_ShoppingContent_OrdersRefundItemResponse");
  }
  /**
   * Issues a partial or total refund for an order. (orders.refundorder)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order to refund.
   * @param Google_Service_ShoppingContent_OrdersRefundOrderRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersRefundOrderResponse
   */
  public function refundorder($merchantId, $orderId, Google_Service_ShoppingContent_OrdersRefundOrderRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('refundorder', array($params), "Google_Service_ShoppingContent_OrdersRefundOrderResponse");
  }
  /**
   * Rejects return on an line item. (orders.rejectreturnlineitem)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersRejectReturnLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersRejectReturnLineItemResponse
   */
  public function rejectreturnlineitem($merchantId, $orderId, Google_Service_ShoppingContent_OrdersRejectReturnLineItemRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rejectreturnlineitem', array($params), "Google_Service_ShoppingContent_OrdersRejectReturnLineItemResponse");
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
   * @param Google_Service_ShoppingContent_OrdersReturnRefundLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersReturnRefundLineItemResponse
   */
  public function returnrefundlineitem($merchantId, $orderId, Google_Service_ShoppingContent_OrdersReturnRefundLineItemRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('returnrefundlineitem', array($params), "Google_Service_ShoppingContent_OrdersReturnRefundLineItemResponse");
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
   * @param Google_Service_ShoppingContent_OrdersSetLineItemMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersSetLineItemMetadataResponse
   */
  public function setlineitemmetadata($merchantId, $orderId, Google_Service_ShoppingContent_OrdersSetLineItemMetadataRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setlineitemmetadata', array($params), "Google_Service_ShoppingContent_OrdersSetLineItemMetadataResponse");
  }
  /**
   * Marks line item(s) as shipped. (orders.shiplineitems)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersShipLineItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersShipLineItemsResponse
   */
  public function shiplineitems($merchantId, $orderId, Google_Service_ShoppingContent_OrdersShipLineItemsRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('shiplineitems', array($params), "Google_Service_ShoppingContent_OrdersShipLineItemsResponse");
  }
  /**
   * Updates ship by and delivery by dates for a line item.
   * (orders.updatelineitemshippingdetails)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersUpdateLineItemShippingDetailsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersUpdateLineItemShippingDetailsResponse
   */
  public function updatelineitemshippingdetails($merchantId, $orderId, Google_Service_ShoppingContent_OrdersUpdateLineItemShippingDetailsRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatelineitemshippingdetails', array($params), "Google_Service_ShoppingContent_OrdersUpdateLineItemShippingDetailsResponse");
  }
  /**
   * Updates the merchant order ID for a given order.
   * (orders.updatemerchantorderid)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersUpdateMerchantOrderIdRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersUpdateMerchantOrderIdResponse
   */
  public function updatemerchantorderid($merchantId, $orderId, Google_Service_ShoppingContent_OrdersUpdateMerchantOrderIdRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatemerchantorderid', array($params), "Google_Service_ShoppingContent_OrdersUpdateMerchantOrderIdResponse");
  }
  /**
   * Updates a shipment's status, carrier, and/or tracking ID.
   * (orders.updateshipment)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $orderId The ID of the order.
   * @param Google_Service_ShoppingContent_OrdersUpdateShipmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_OrdersUpdateShipmentResponse
   */
  public function updateshipment($merchantId, $orderId, Google_Service_ShoppingContent_OrdersUpdateShipmentRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'orderId' => $orderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateshipment', array($params), "Google_Service_ShoppingContent_OrdersUpdateShipmentResponse");
  }
}
