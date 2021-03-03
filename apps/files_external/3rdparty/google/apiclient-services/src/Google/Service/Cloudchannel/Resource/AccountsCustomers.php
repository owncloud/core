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
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google_Service_Cloudchannel(...);
 *   $customers = $cloudchannelService->customers;
 *  </code>
 */
class Google_Service_Cloudchannel_Resource_AccountsCustomers extends Google_Service_Resource
{
  /**
   * Creates a new Customer resource under the reseller or distributor account.
   * Possible Error Codes: * PERMISSION_DENIED: If the reseller account making the
   * request and the reseller account being queried for are different. *
   * INVALID_ARGUMENT: It can happen in following scenarios - * Missing or invalid
   * required parameters in the request. * Domain field value doesn't match the
   * domain specified in primary email. Return Value: If successful, the newly
   * created Customer resource, otherwise returns an error. (customers.create)
   *
   * @param string $parent Required. The resource name of reseller account in
   * which to create the customer. The parent takes the format:
   * accounts/{account_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Customer
   */
  public function create($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1Customer $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1Customer");
  }
  /**
   * Deletes the given Customer permanently and irreversibly. Possible Error
   * Codes: * PERMISSION_DENIED: If the account making the request does not own
   * this customer. * INVALID_ARGUMENT: Missing or invalid required parameters in
   * the request. * FAILED_PRECONDITION: If the customer has existing
   * entitlements. * NOT_FOUND: No Customer resource found for the name specified
   * in the request. (customers.delete)
   *
   * @param string $name Required. The resource name of the customer to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Cloudchannel_GoogleProtobufEmpty");
  }
  /**
   * Returns a requested Customer resource. Possible Error Codes: *
   * PERMISSION_DENIED: If the reseller account making the request and the
   * reseller account being queried for are different. * INVALID_ARGUMENT: Missing
   * or invalid required parameters in the request. * NOT_FOUND: If the customer
   * resource doesn't exist. Usually the result of an invalid name parameter.
   * Return Value: Customer resource if found, error otherwise. (customers.get)
   *
   * @param string $name Required. The resource name of the customer to retrieve.
   * The name takes the format: accounts/{account_id}/customers/{customer_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Customer
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1Customer");
  }
  /**
   * List downstream Customers. Possible Error Codes: * PERMISSION_DENIED: If the
   * reseller account making the request and the reseller account being queried
   * for are different. * INVALID_ARGUMENT: Missing or invalid required parameters
   * in the request. Return Value: List of Customers pertaining to the reseller or
   * empty list if there are none. (customers.listAccountsCustomers)
   *
   * @param string $parent Required. The resource name of the reseller account
   * from which to list customers. The parent takes the format:
   * accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of customers to return.
   * The service may return fewer than this value. If unspecified, at most 10
   * customers will be returned. The maximum value is 50; values about 50 will be
   * coerced to 50.
   * @opt_param string pageToken Optional. A token identifying a page of results,
   * if other than the first one. Typically obtained via
   * ListCustomersResponse.next_page_token of the previous
   * CloudChannelService.ListCustomers call.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListCustomersResponse
   */
  public function listAccountsCustomers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListCustomersResponse");
  }
  /**
   * Lists the Purchasable Offers for the following cases: * Offers that can be
   * newly purchased for a customer * Offers that can be changed to, for an
   * entitlement. Possible Error Codes: * PERMISSION_DENIED: If the customer
   * doesn't belong to the reseller * INVALID_ARGUMENT: Missing or invalid
   * required parameters in the request. (customers.listPurchasableOffers)
   *
   * @param string $customer Required. The resource name of the customer for which
   * to list Offers. Format: accounts/{account_id}/customers/{customer_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string changeOfferPurchase.entitlement Required. Resource name of
   * the entitlement. Format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @opt_param string changeOfferPurchase.newSku Optional. Resource name of the
   * SKU that is being changed to. Should be provided if upgrading or downgrading
   * an entitlement. Format: products/{product_id}/skus/{sku_id}
   * @opt_param string createEntitlementPurchase.sku Required. SKU that the result
   * should be restricted to. Format: products/{product_id}/skus/{sku_id}.
   * @opt_param string languageCode Optional. The BCP-47 language code, such as
   * "en-US". If specified, the response will be localized to the corresponding
   * language code. Default is "en-US".
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, at most 100 Offers will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken Optional. A token identifying a page of results,
   * if other than the first one.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableOffersResponse
   */
  public function listPurchasableOffers($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('listPurchasableOffers', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableOffersResponse");
  }
  /**
   * Lists the Purchasable SKUs for following cases: * SKUs that can be newly
   * purchased for a customer * SKUs that can be upgraded/downgraded to, for an
   * entitlement. Possible Error Codes: * PERMISSION_DENIED: If the customer
   * doesn't belong to the reseller * INVALID_ARGUMENT: Missing or invalid
   * required parameters in the request. (customers.listPurchasableSkus)
   *
   * @param string $customer Required. The resource name of the customer for which
   * to list SKUs. Format: accounts/{account_id}/customers/{customer_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string changeOfferPurchase.changeType Required. Change Type for
   * the entitlement.
   * @opt_param string changeOfferPurchase.entitlement Required. Resource name of
   * the entitlement. Format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @opt_param string createEntitlementPurchase.product Required. List SKUs
   * belonging to this Product. Format: products/{product_id}. Supports products/-
   * to retrieve SKUs for all products.
   * @opt_param string languageCode Optional. The BCP-47 language code, such as
   * "en-US". If specified, the response will be localized to the corresponding
   * language code. Default is "en-US".
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, at most 100 SKUs will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken Optional. A token identifying a page of results,
   * if other than the first one.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableSkusResponse
   */
  public function listPurchasableSkus($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('listPurchasableSkus', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableSkusResponse");
  }
  /**
   * Updates an existing Customer resource belonging to the reseller or
   * distributor. Possible Error Codes: * PERMISSION_DENIED: If the reseller
   * account making the request and the reseller account being queried for are
   * different. * INVALID_ARGUMENT: Missing or invalid required parameters in the
   * request. * NOT_FOUND: No Customer resource found for the name specified in
   * the request. Return Value: If successful, the updated Customer resource,
   * otherwise returns an error. (customers.patch)
   *
   * @param string $name Output only. Resource name of the customer. Format:
   * accounts/{account_id}/customers/{customer_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Customer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask that applies to the resource.
   * Optional.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Customer
   */
  public function patch($name, Google_Service_Cloudchannel_GoogleCloudChannelV1Customer $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1Customer");
  }
  /**
   * Creates a Cloud Identity for the given customer using the customer's
   * information or the information provided here, if present. Possible Error
   * Codes: * PERMISSION_DENIED: If the customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request. *
   * NOT_FOUND: If the customer is not found for the reseller. * ALREADY_EXISTS:
   * If the customer's primary email already exists. In this case, retry after
   * changing the customer's primary contact email. * INTERNAL: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel support in
   * this case. * UNKNOWN: Any non-user error related to a technical issue in the
   * backend. Contact Cloud Channel support in this case. Return Value: Long
   * Running Operation ID. To get the results of the operation, call the
   * GetOperation method of CloudChannelOperationsService. The Operation metadata
   * will contain an instance of OperationMetadata.
   * (customers.provisionCloudIdentity)
   *
   * @param string $customer Required. Resource name of the customer. Format:
   * accounts/{account_id}/customers/{customer_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionCloudIdentityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function provisionCloudIdentity($customer, Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionCloudIdentityRequest $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('provisionCloudIdentity', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Transfers customer entitlements to new reseller. Possible Error Codes: *
   * PERMISSION_DENIED: If the customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request. *
   * NOT_FOUND: If the customer or offer resource is not found for the reseller. *
   * ALREADY_EXISTS: If the SKU has been already transferred for the customer. *
   * CONDITION_NOT_MET or FAILED_PRECONDITION: This failure can happen in the
   * following cases: * Transferring a SKU that requires domain verification and
   * the domain has not been verified. * Transferring an Add-On SKU like Vault or
   * Drive without transferring the pre-requisite SKU, such as G Suite Basic. *
   * Applicable only for developer accounts: reseller and resold domain must
   * follow the domain naming convention as follows: * Domain names must start
   * with goog-test. * Resold domain names must include the reseller domain. * All
   * transferring entitlements must be specified. * INTERNAL: Any non-user error
   * related to a technical issue in the backend. Please contact Cloud Channel
   * Support in this case. * UNKNOWN: Any non-user error related to a technical
   * issue in the backend. Please contact Cloud Channel Support in this case.
   * Return Value: Long Running Operation ID. To get the results of the operation,
   * call the GetOperation method of CloudChannelOperationsService. The Operation
   * metadata will contain an instance of OperationMetadata.
   * (customers.transferEntitlements)
   *
   * @param string $parent Required. The resource name of reseller's customer
   * account where the entitlements transfer to. The parent takes the format:
   * accounts/{account_id}/customers/{customer_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEntitlementsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function transferEntitlements($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEntitlementsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('transferEntitlements', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Transfers customer entitlements from current reseller to Google. Possible
   * Error Codes: * PERMISSION_DENIED: If the customer doesn't belong to the
   * reseller. * INVALID_ARGUMENT: Missing or invalid required parameters in the
   * request. * NOT_FOUND: If the customer or offer resource is not found for the
   * reseller. * ALREADY_EXISTS: If the SKU has been already transferred for the
   * customer. * CONDITION_NOT_MET or FAILED_PRECONDITION: This failure can happen
   * in the following cases: * Transferring a SKU that requires domain
   * verification and the domain has not been verified. * Transferring an Add-On
   * SKU like Vault or Drive without purchasing the pre-requisite SKU, such as G
   * Suite Basic. * Applicable only for developer accounts: reseller and resold
   * domain must follow the domain naming convention as follows: * Domain names
   * must start with goog-test. * Resold domain names must include the reseller
   * domain. * INTERNAL: Any non-user error related to a technical issue in the
   * backend. Please contact Cloud Channel Support in this case. * UNKNOWN: Any
   * non-user error related to a technical issue in the backend. Please contact
   * Cloud Channel Support in this case. Return Value: Long Running Operation ID.
   * To get the results of the operation, call the GetOperation method of
   * CloudChannelOperationsService. The response will contain
   * google.protobuf.Empty on success. The Operation metadata will contain an
   * instance of OperationMetadata. (customers.transferEntitlementsToGoogle)
   *
   * @param string $parent Required. The resource name of reseller's customer
   * account where the entitlements transfer from. The parent takes the format:
   * accounts/{account_id}/customers/{customer_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEntitlementsToGoogleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function transferEntitlementsToGoogle($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEntitlementsToGoogleRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('transferEntitlementsToGoogle', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
}
