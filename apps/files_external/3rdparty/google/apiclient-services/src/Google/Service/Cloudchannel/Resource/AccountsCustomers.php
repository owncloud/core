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
   * Possible error codes: * PERMISSION_DENIED: The reseller account making the
   * request is different from the reseller account in the API request. *
   * INVALID_ARGUMENT: * Required request parameters are missing or invalid. *
   * Domain field value doesn't match the primary email domain. Return value: The
   * newly created Customer resource. (customers.create)
   *
   * @param string $parent Required. The resource name of reseller account in
   * which to create the customer. Parent uses the format: accounts/{account_id}
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
   * Deletes the given Customer permanently. Possible error codes: *
   * PERMISSION_DENIED: The account making the request does not own this customer.
   * * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * FAILED_PRECONDITION: The customer has existing entitlements. * NOT_FOUND: No
   * Customer resource found for the name in the request. (customers.delete)
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
   * Returns the requested Customer resource. Possible error codes: *
   * PERMISSION_DENIED: The reseller account making the request is different from
   * the reseller account in the API request. * INVALID_ARGUMENT: Required request
   * parameters are missing or invalid. * NOT_FOUND: The customer resource doesn't
   * exist. Usually the result of an invalid name parameter. Return value: The
   * Customer resource. (customers.get)
   *
   * @param string $name Required. The resource name of the customer to retrieve.
   * Name uses the format: accounts/{account_id}/customers/{customer_id}
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
   * List Customers. Possible error codes: * PERMISSION_DENIED: The reseller
   * account making the request is different from the reseller account in the API
   * request. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. Return value: List of Customers, or an empty list if there are no
   * customers. (customers.listAccountsCustomers)
   *
   * @param string $parent Required. The resource name of the reseller account to
   * list customers from. Parent uses the format: accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of customers to return.
   * The service may return fewer than this value. If unspecified, returns at most
   * 10 customers. The maximum value is 50.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * other than the first page. Obtained through
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
   * Lists the following: * Offers that you can purchase for a customer. * Offers
   * that you can change for an entitlement. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid.
   * (customers.listPurchasableOffers)
   *
   * @param string $customer Required. The resource name of the customer to list
   * Offers for. Format: accounts/{account_id}/customers/{customer_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string changeOfferPurchase.entitlement Required. Resource name of
   * the entitlement. Format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @opt_param string changeOfferPurchase.newSku Optional. Resource name of the
   * new target SKU. Provide this SKU when upgrading or downgrading an
   * entitlement. Format: products/{product_id}/skus/{sku_id}
   * @opt_param string createEntitlementPurchase.sku Required. SKU that the result
   * should be restricted to. Format: products/{product_id}/skus/{sku_id}.
   * @opt_param string languageCode Optional. The BCP-47 language code. For
   * example, "en-US". The response will localize in the corresponding language
   * code, if specified. The default value is "en-US".
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, returns at most 100 Offers. The
   * maximum value is 1000; the server will coerce values above 1000.
   * @opt_param string pageToken Optional. A token for a page of results other
   * than the first page.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableOffersResponse
   */
  public function listPurchasableOffers($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('listPurchasableOffers', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableOffersResponse");
  }
  /**
   * Lists the following: * SKUs that you can purchase for a customer * SKUs that
   * you can upgrade or downgrade for an entitlement. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid.
   * (customers.listPurchasableSkus)
   *
   * @param string $customer Required. The resource name of the customer to list
   * SKUs for. Format: accounts/{account_id}/customers/{customer_id}.
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
   * @opt_param string languageCode Optional. The BCP-47 language code. For
   * example, "en-US". The response will localize in the corresponding language
   * code, if specified. The default value is "en-US".
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, returns at most 100 SKUs. The
   * maximum value is 1000; the server will coerce values above 1000.
   * @opt_param string pageToken Optional. A token for a page of results other
   * than the first page.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableSkusResponse
   */
  public function listPurchasableSkus($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('listPurchasableSkus', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListPurchasableSkusResponse");
  }
  /**
   * Updates an existing Customer resource for the reseller or distributor.
   * Possible error codes: * PERMISSION_DENIED: The reseller account making the
   * request is different from the reseller account in the API request. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: No Customer resource found for the name in the request. Return
   * value: The updated Customer resource. (customers.patch)
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
   * information, or the information provided here. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: The customer was not found. * ALREADY_EXISTS: The customer's
   * primary email already exists. Retry after changing the customer's primary
   * contact email. * INTERNAL: Any non-user error related to a technical issue in
   * the backend. Contact Cloud Channel support. * UNKNOWN: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel support.
   * Return value: The ID of a long-running operation. To get the results of the
   * operation, call the GetOperation method of CloudChannelOperationsService. The
   * Operation metadata contains an instance of OperationMetadata.
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
   * Transfers customer entitlements to new reseller. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: The customer or offer resource was not found. * ALREADY_EXISTS:
   * The SKU was already transferred for the customer. * CONDITION_NOT_MET or
   * FAILED_PRECONDITION: * The SKU requires domain verification to transfer, but
   * the domain is not verified. * An Add-On SKU (example, Vault or Drive) is
   * missing the pre-requisite SKU (example, G Suite Basic). * (Developer accounts
   * only) Reseller and resold domain must meet the following naming requirements:
   * * Domain names must start with goog-test. * Domain names must include the
   * reseller domain. * Specify all transferring entitlements. * INTERNAL: Any
   * non-user error related to a technical issue in the backend. Contact Cloud
   * Channel support. * UNKNOWN: Any non-user error related to a technical issue
   * in the backend. Contact Cloud Channel support. Return value: The ID of a
   * long-running operation. To get the results of the operation, call the
   * GetOperation method of CloudChannelOperationsService. The Operation metadata
   * will contain an instance of OperationMetadata.
   * (customers.transferEntitlements)
   *
   * @param string $parent Required. The resource name of the reseller's customer
   * account that will receive transferred entitlements. Parent uses the format:
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
   * Transfers customer entitlements from their current reseller to Google.
   * Possible error codes: * PERMISSION_DENIED: The customer doesn't belong to the
   * reseller. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. * NOT_FOUND: The customer or offer resource was not found. *
   * ALREADY_EXISTS: The SKU was already transferred for the customer. *
   * CONDITION_NOT_MET or FAILED_PRECONDITION: * The SKU requires domain
   * verification to transfer, but the domain is not verified. * An Add-On SKU
   * (example, Vault or Drive) is missing the pre-requisite SKU (example, G Suite
   * Basic). * (Developer accounts only) Reseller and resold domain must meet the
   * following naming requirements: * Domain names must start with goog-test. *
   * Domain names must include the reseller domain. * INTERNAL: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel support. *
   * UNKNOWN: Any non-user error related to a technical issue in the backend.
   * Contact Cloud Channel support. Return value: The ID of a long-running
   * operation. To get the results of the operation, call the GetOperation method
   * of CloudChannelOperationsService. The response will contain
   * google.protobuf.Empty on success. The Operation metadata will contain an
   * instance of OperationMetadata. (customers.transferEntitlementsToGoogle)
   *
   * @param string $parent Required. The resource name of the reseller's customer
   * account where the entitlements transfer from. Parent uses the format:
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
