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
 * The "entitlements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google_Service_Cloudchannel(...);
 *   $entitlements = $cloudchannelService->entitlements;
 *  </code>
 */
class Google_Service_Cloudchannel_Resource_AccountsCustomersEntitlements extends Google_Service_Resource
{
  /**
   * Activates a previously suspended entitlement. The entitlement must be in a
   * suspended state for it to be activated. Entitlements suspended for pending
   * ToS acceptance can't be activated using this method. An entitlement
   * activation is a long-running operation and can result in updates to the state
   * of the customer entitlement. Possible Error Codes: * PERMISSION_DENIED: If
   * the customer doesn't belong to the reseller or if the reseller account making
   * the request and reseller account being queried for are different. *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request. *
   * NOT_FOUND: Entitlement resource not found. *
   * SUSPENSION_NOT_RESELLER_INITIATED: Can't activate an entitlement that is
   * pending TOS acceptance. Only reseller initiated suspensions can be activated.
   * * NOT_SUSPENDED: Can't activate entitlements that are already in ACTIVE
   * state. Can only activate suspended entitlements. * INTERNAL: Any non-user
   * error related to a technical issue in the backend. In this case, contact
   * Cloud Channel support. * UNKNOWN: Any non-user error related to a technical
   * issue in the backend. In this case, contact Cloud Channel support. Return
   * Value: Long Running Operation ID. To get the results of the operation, call
   * the GetOperation method of CloudChannelOperationsService. The Operation
   * metadata will contain an instance of OperationMetadata.
   * (entitlements.activate)
   *
   * @param string $name Required. The resource name of the entitlement to
   * activate. The name takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ActivateEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function activate($name, Google_Service_Cloudchannel_GoogleCloudChannelV1ActivateEntitlementRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Cancels a previously fulfilled entitlement. An entitlement cancellation is a
   * long-running operation. Possible Error Codes: * PERMISSION_DENIED: If the
   * customer doesn't belong to the reseller or if the reseller account making the
   * request and reseller account being queried for are different. *
   * FAILED_PRECONDITION: If there are any Google Cloud projects linked to the
   * Google Cloud entitlement's Cloud Billing subaccount. * INVALID_ARGUMENT:
   * Missing or invalid required parameters in the request. * NOT_FOUND:
   * Entitlement resource not found. * DELETION_TYPE_NOT_ALLOWED: Cancel is only
   * allowed for Google Workspace add-ons or entitlements for Google Cloud's
   * development platform. * INTERNAL: Any non-user error related to a technical
   * issue in the backend. In this case, contact Cloud Channel support. * UNKNOWN:
   * Any non-user error related to a technical issue in the backend. In this case,
   * contact Cloud Channel support. Return Value: Long Running Operation ID. To
   * get the results of the operation, call the GetOperation method of
   * CloudChannelOperationsService. The response will contain
   * google.protobuf.Empty on success. The Operation metadata will contain an
   * instance of OperationMetadata. (entitlements.cancel)
   *
   * @param string $name Required. The resource name of the entitlement to cancel.
   * The name takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1CancelEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function cancel($name, Google_Service_Cloudchannel_GoogleCloudChannelV1CancelEntitlementRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Updates the Offer for an existing customer entitlement. An entitlement update
   * is a long-running operation and results in updates to the entitlement as a
   * result of fulfillment. Possible Error Codes: * PERMISSION_DENIED: If the
   * customer doesn't belong to the reseller. * INVALID_ARGUMENT: Missing or
   * invalid required parameters in the request. * NOT_FOUND: Offer or Entitlement
   * resource not found. * INTERNAL: Any non-user error related to a technical
   * issue in the backend. In this case, contact Cloud Channel support. * UNKNOWN:
   * Any non-user error related to a technical issue in the backend. In this case,
   * contact Cloud Channel support. Return Value: Long Running Operation ID. To
   * get the results of the operation, call the GetOperation method of
   * CloudChannelOperationsService. The Operation metadata will contain an
   * instance of OperationMetadata. (entitlements.changeOffer)
   *
   * @param string $name Required. The name of the entitlement to update. Format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ChangeOfferRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function changeOffer($name, Google_Service_Cloudchannel_GoogleCloudChannelV1ChangeOfferRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('changeOffer', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Change parameters of the entitlement An entitlement parameters update is a
   * long-running operation and results in updates to the entitlement as a result
   * of fulfillment. Possible Error Codes: * PERMISSION_DENIED: If the customer
   * doesn't belong to the reseller. * INVALID_ARGUMENT: Missing or invalid
   * required parameters in the request. For example, if the number of seats being
   * changed to is greater than the allowed number of max seats for the resource.
   * Or decreasing seats for a commitment based plan. * NOT_FOUND: Entitlement
   * resource not found. * INTERNAL: Any non-user error related to a technical
   * issue in the backend. In this case, contact Cloud Channel support. * UNKNOWN:
   * Any non-user error related to a technical issue in the backend. In this case,
   * contact Cloud Channel support. Return Value: Long Running Operation ID. To
   * get the results of the operation, call the GetOperation method of
   * CloudChannelOperationsService. The Operation metadata will contain an
   * instance of OperationMetadata. (entitlements.changeParameters)
   *
   * @param string $name Required. The name of the entitlement to update. The name
   * takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ChangeParametersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function changeParameters($name, Google_Service_Cloudchannel_GoogleCloudChannelV1ChangeParametersRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('changeParameters', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Updates the renewal settings for an existing customer entitlement. An
   * entitlement update is a long-running operation and results in updates to the
   * entitlement as a result of fulfillment. Possible Error Codes: *
   * PERMISSION_DENIED: If the customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request. *
   * NOT_FOUND: Entitlement resource not found. * NOT_COMMITMENT_PLAN: Renewal
   * Settings are only applicable for a commitment plan. Can't enable or disable
   * renewal for non-commitment plans. * INTERNAL: Any non user error related to a
   * technical issue in the backend. In this case, contact Cloud Channel support.
   * * UNKNOWN: Any non user error related to a technical issue in the backend. In
   * this case, contact Cloud Channel support. Return Value: Long Running
   * Operation ID. To get the results of the operation, call the GetOperation
   * method of CloudChannelOperationsService. The Operation metadata will contain
   * an instance of OperationMetadata. (entitlements.changeRenewalSettings)
   *
   * @param string $name Required. The name of the entitlement to update. The name
   * takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ChangeRenewalSettingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function changeRenewalSettings($name, Google_Service_Cloudchannel_GoogleCloudChannelV1ChangeRenewalSettingsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('changeRenewalSettings', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Creates an entitlement for a customer. Possible Error Codes: *
   * PERMISSION_DENIED: If the customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: It can happen in below scenarios - * Missing or invalid
   * required parameters in the request. * Cannot purchase an entitlement if there
   * is already an entitlement for customer, for a SKU from the same product
   * family. * INVALID_VALUE: Offer passed in isn't valid. Make sure OfferId is
   * valid. If it is valid, then contact Google Channel support for further
   * troubleshooting. * NOT_FOUND: If the customer or offer resource is not found
   * for the reseller. * ALREADY_EXISTS: This failure can happen in the following
   * cases: * If the SKU has been already purchased for the customer. * If the
   * customer's primary email already exists. In this case retry after changing
   * the customer's primary contact email. * CONDITION_NOT_MET or
   * FAILED_PRECONDITION: This failure can happen in the following cases: *
   * Purchasing a SKU that requires domain verification and the domain has not
   * been verified. * Purchasing an Add-On SKU like Vault or Drive without
   * purchasing the pre-requisite SKU, such as Google Workspace Business Starter.
   * * Applicable only for developer accounts: reseller and resold domain. Must
   * meet the following domain naming requirements: * Domain names must start with
   * goog-test. * Resold domain names must include the reseller domain. *
   * INTERNAL: Any non-user error related to a technical issue in the backend.
   * Contact Cloud Channel Support in this case. * UNKNOWN: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel Support in
   * this case. Return Value: Long Running Operation ID. To get the results of the
   * operation, call the GetOperation method of CloudChannelOperationsService. The
   * Operation metadata will contain an instance of OperationMetadata.
   * (entitlements.create)
   *
   * @param string $parent Required. The resource name of reseller's customer
   * account in which to create the entitlement. The parent takes the format:
   * accounts/{account_id}/customers/{customer_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1CreateEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1CreateEntitlementRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Returns a requested Entitlement resource. Possible Error Codes: *
   * PERMISSION_DENIED: If the customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request. *
   * NOT_FOUND: If the entitlement is not found for the customer. Return Value: If
   * found, the requested Entitlement resource, otherwise returns an error.
   * (entitlements.get)
   *
   * @param string $name Required. The resource name of the entitlement to
   * retrieve. The name takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Entitlement
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1Entitlement");
  }
  /**
   * List Entitlements belonging to a customer. Possible Error Codes: *
   * PERMISSION_DENIED: If the customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request.
   * Return Value: List of Entitlements belonging to the customer, or empty list
   * if there are none. (entitlements.listAccountsCustomersEntitlements)
   *
   * @param string $parent Required. The resource name of the reseller's customer
   * account for which to list entitlements. The parent takes the format:
   * accounts/{account_id}/customers/{customer_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, at most 50 entitlements will be
   * returned. The maximum value is 100; values above 100 will be coerced to 100.
   * @opt_param string pageToken Optional. A token identifying a page of results,
   * if other than the first one. Typically obtained via
   * ListEntitlementsResponse.next_page_token of the previous
   * CloudChannelService.ListEntitlements call.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListEntitlementsResponse
   */
  public function listAccountsCustomersEntitlements($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListEntitlementsResponse");
  }
  /**
   * Starts paid service for a trial entitlement. Starts paid service for a trial
   * entitlement immediately. This method is only applicable if a plan has already
   * been set up for a trial entitlement but has some trial days remaining.
   * Possible Error Codes: * PERMISSION_DENIED: If the customer doesn't belong to
   * the reseller. * INVALID_ARGUMENT: Missing or invalid required parameters in
   * the request. * NOT_FOUND: Entitlement resource not found. *
   * FAILED_PRECONDITION/NOT_IN_TRIAL: This method only works for entitlement on
   * trial plans. * INTERNAL: Any non-user error related to a technical issue in
   * the backend. In this case, contact Cloud Channel support. * UNKNOWN: Any non-
   * user error related to a technical issue in the backend. In this case, contact
   * Cloud Channel support. Return Value: Long Running Operation ID. To get the
   * results of the operation, call the GetOperation method of
   * CloudChannelOperationsService. The Operation metadata will contain an
   * instance of OperationMetadata. (entitlements.startPaidService)
   *
   * @param string $name Required. The name of the entitlement for which paid
   * service is being started. The name takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1StartPaidServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function startPaidService($name, Google_Service_Cloudchannel_GoogleCloudChannelV1StartPaidServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('startPaidService', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
  /**
   * Suspends a previously fulfilled entitlement. An entitlement suspension is a
   * long-running operation. Possible Error Codes: * PERMISSION_DENIED: If the
   * customer doesn't belong to the reseller. * INVALID_ARGUMENT: Missing or
   * invalid required parameters in the request. * NOT_FOUND: Entitlement resource
   * not found. * NOT_ACTIVE: Entitlement is not active. * INTERNAL: Any non-user
   * error related to a technical issue in the backend. In this case, contact
   * Cloud Channel support. * UNKNOWN: Any non-user error related to a technical
   * issue in the backend. In this case, contact Cloud Channel support. Return
   * Value: Long Running Operation ID. To get the results of the operation, call
   * the GetOperation method of CloudChannelOperationsService. The Operation
   * metadata will contain an instance of OperationMetadata.
   * (entitlements.suspend)
   *
   * @param string $name Required. The resource name of the entitlement to
   * suspend. The name takes the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1SuspendEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleLongrunningOperation
   */
  public function suspend($name, Google_Service_Cloudchannel_GoogleCloudChannelV1SuspendEntitlementRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('suspend', array($params), "Google_Service_Cloudchannel_GoogleLongrunningOperation");
  }
}
