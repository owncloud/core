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

namespace Google\Service\Cloudchannel\Resource;

use Google\Service\Cloudchannel\GoogleCloudChannelV1ActivateEntitlementRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1CancelEntitlementRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ChangeOfferRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ChangeParametersRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ChangeRenewalSettingsRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1CreateEntitlementRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1Entitlement;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListEntitlementsResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1Offer;
use Google\Service\Cloudchannel\GoogleCloudChannelV1StartPaidServiceRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1SuspendEntitlementRequest;
use Google\Service\Cloudchannel\GoogleLongrunningOperation;

/**
 * The "entitlements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $entitlements = $cloudchannelService->entitlements;
 *  </code>
 */
class AccountsCustomersEntitlements extends \Google\Service\Resource
{
  /**
   * Activates a previously suspended entitlement. Entitlements suspended for
   * pending ToS acceptance can't be activated using this method. An entitlement
   * activation is a long-running operation and it updates the state of the
   * customer entitlement. Possible error codes: * PERMISSION_DENIED: The reseller
   * account making the request is different from the reseller account in the API
   * request. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. * NOT_FOUND: Entitlement resource not found. *
   * SUSPENSION_NOT_RESELLER_INITIATED: Can only activate reseller-initiated
   * suspensions and entitlements that have accepted the TOS. * NOT_SUSPENDED: Can
   * only activate suspended entitlements not in an ACTIVE state. * INTERNAL: Any
   * non-user error related to a technical issue in the backend. Contact Cloud
   * Channel support. * UNKNOWN: Any non-user error related to a technical issue
   * in the backend. Contact Cloud Channel support. Return value: The ID of a
   * long-running operation. To get the results of the operation, call the
   * GetOperation method of CloudChannelOperationsService. The Operation metadata
   * will contain an instance of OperationMetadata. (entitlements.activate)
   *
   * @param string $name Required. The resource name of the entitlement to
   * activate. Name uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1ActivateEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function activate($name, GoogleCloudChannelV1ActivateEntitlementRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Cancels a previously fulfilled entitlement. An entitlement cancellation is a
   * long-running operation. Possible error codes: * PERMISSION_DENIED: The
   * reseller account making the request is different from the reseller account in
   * the API request. * FAILED_PRECONDITION: There are Google Cloud projects
   * linked to the Google Cloud entitlement's Cloud Billing subaccount. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: Entitlement resource not found. * DELETION_TYPE_NOT_ALLOWED:
   * Cancel is only allowed for Google Workspace add-ons, or entitlements for
   * Google Cloud's development platform. * INTERNAL: Any non-user error related
   * to a technical issue in the backend. Contact Cloud Channel support. *
   * UNKNOWN: Any non-user error related to a technical issue in the backend.
   * Contact Cloud Channel support. Return value: The ID of a long-running
   * operation. To get the results of the operation, call the GetOperation method
   * of CloudChannelOperationsService. The response will contain
   * google.protobuf.Empty on success. The Operation metadata will contain an
   * instance of OperationMetadata. (entitlements.cancel)
   *
   * @param string $name Required. The resource name of the entitlement to cancel.
   * Name uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1CancelEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function cancel($name, GoogleCloudChannelV1CancelEntitlementRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Updates the Offer for an existing customer entitlement. An entitlement update
   * is a long-running operation and it updates the entitlement as a result of
   * fulfillment. Possible error codes: * PERMISSION_DENIED: The customer doesn't
   * belong to the reseller. * INVALID_ARGUMENT: Required request parameters are
   * missing or invalid. * NOT_FOUND: Offer or Entitlement resource not found. *
   * INTERNAL: Any non-user error related to a technical issue in the backend.
   * Contact Cloud Channel support. * UNKNOWN: Any non-user error related to a
   * technical issue in the backend. Contact Cloud Channel support. Return value:
   * The ID of a long-running operation. To get the results of the operation, call
   * the GetOperation method of CloudChannelOperationsService. The Operation
   * metadata will contain an instance of OperationMetadata.
   * (entitlements.changeOffer)
   *
   * @param string $name Required. The resource name of the entitlement to update.
   * Name uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1ChangeOfferRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function changeOffer($name, GoogleCloudChannelV1ChangeOfferRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('changeOffer', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Change parameters of the entitlement. An entitlement update is a long-running
   * operation and it updates the entitlement as a result of fulfillment. Possible
   * error codes: * PERMISSION_DENIED: The customer doesn't belong to the
   * reseller. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. For example, the number of seats being changed is greater than the
   * allowed number of max seats, or decreasing seats for a commitment based plan.
   * * NOT_FOUND: Entitlement resource not found. * INTERNAL: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel support. *
   * UNKNOWN: Any non-user error related to a technical issue in the backend.
   * Contact Cloud Channel support. Return value: The ID of a long-running
   * operation. To get the results of the operation, call the GetOperation method
   * of CloudChannelOperationsService. The Operation metadata will contain an
   * instance of OperationMetadata. (entitlements.changeParameters)
   *
   * @param string $name Required. The name of the entitlement to update. Name
   * uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1ChangeParametersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function changeParameters($name, GoogleCloudChannelV1ChangeParametersRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('changeParameters', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Updates the renewal settings for an existing customer entitlement. An
   * entitlement update is a long-running operation and it updates the entitlement
   * as a result of fulfillment. Possible error codes: * PERMISSION_DENIED: The
   * customer doesn't belong to the reseller. * INVALID_ARGUMENT: Required request
   * parameters are missing or invalid. * NOT_FOUND: Entitlement resource not
   * found. * NOT_COMMITMENT_PLAN: Renewal Settings are only applicable for a
   * commitment plan. Can't enable or disable renewals for non-commitment plans. *
   * INTERNAL: Any non-user error related to a technical issue in the backend.
   * Contact Cloud Channel support. * UNKNOWN: Any non-user error related to a
   * technical issue in the backend. Contact Cloud Channel support. Return value:
   * The ID of a long-running operation. To get the results of the operation, call
   * the GetOperation method of CloudChannelOperationsService. The Operation
   * metadata will contain an instance of OperationMetadata.
   * (entitlements.changeRenewalSettings)
   *
   * @param string $name Required. The name of the entitlement to update. Name
   * uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1ChangeRenewalSettingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function changeRenewalSettings($name, GoogleCloudChannelV1ChangeRenewalSettingsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('changeRenewalSettings', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Creates an entitlement for a customer. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: * Required request parameters are missing or invalid. *
   * There is already a customer entitlement for a SKU from the same product
   * family. * INVALID_VALUE: Make sure the OfferId is valid. If it is, contact
   * Google Channel support for further troubleshooting. * NOT_FOUND: The customer
   * or offer resource was not found. * ALREADY_EXISTS: * The SKU was already
   * purchased for the customer. * The customer's primary email already exists.
   * Retry after changing the customer's primary contact email. *
   * CONDITION_NOT_MET or FAILED_PRECONDITION: * The domain required for
   * purchasing a SKU has not been verified. * A pre-requisite SKU required to
   * purchase an Add-On SKU is missing. For example, Google Workspace Business
   * Starter is required to purchase Vault or Drive. * (Developer accounts only)
   * Reseller and resold domain must meet the following naming requirements: *
   * Domain names must start with goog-test. * Domain names must include the
   * reseller domain. * INTERNAL: Any non-user error related to a technical issue
   * in the backend. Contact Cloud Channel support. * UNKNOWN: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel support.
   * Return value: The ID of a long-running operation. To get the results of the
   * operation, call the GetOperation method of CloudChannelOperationsService. The
   * Operation metadata will contain an instance of OperationMetadata.
   * (entitlements.create)
   *
   * @param string $parent Required. The resource name of the reseller's customer
   * account in which to create the entitlement. Parent uses the format:
   * accounts/{account_id}/customers/{customer_id}
   * @param GoogleCloudChannelV1CreateEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudChannelV1CreateEntitlementRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Returns the requested Entitlement resource. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: The customer entitlement was not found. Return value: The
   * requested Entitlement resource. (entitlements.get)
   *
   * @param string $name Required. The resource name of the entitlement to
   * retrieve. Name uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1Entitlement
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudChannelV1Entitlement::class);
  }
  /**
   * Lists Entitlements belonging to a customer. Possible error codes: *
   * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. Return
   * value: A list of the customer's Entitlements.
   * (entitlements.listAccountsCustomersEntitlements)
   *
   * @param string $parent Required. The resource name of the reseller's customer
   * account to list entitlements for. Parent uses the format:
   * accounts/{account_id}/customers/{customer_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, return at most 50 entitlements.
   * The maximum value is 100; the server will coerce values above 100.
   * @opt_param string pageToken Optional. A token for a page of results other
   * than the first page. Obtained using ListEntitlementsResponse.next_page_token
   * of the previous CloudChannelService.ListEntitlements call.
   * @return GoogleCloudChannelV1ListEntitlementsResponse
   */
  public function listAccountsCustomersEntitlements($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudChannelV1ListEntitlementsResponse::class);
  }
  /**
   * Returns the requested Offer resource. Possible error codes: *
   * PERMISSION_DENIED: The entitlement doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: Entitlement or offer was not found. Return value: The Offer
   * resource. (entitlements.lookupOffer)
   *
   * @param string $entitlement Required. The resource name of the entitlement to
   * retrieve the Offer. Entitlement uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1Offer
   */
  public function lookupOffer($entitlement, $optParams = [])
  {
    $params = ['entitlement' => $entitlement];
    $params = array_merge($params, $optParams);
    return $this->call('lookupOffer', [$params], GoogleCloudChannelV1Offer::class);
  }
  /**
   * Starts paid service for a trial entitlement. Starts paid service for a trial
   * entitlement immediately. This method is only applicable if a plan is set up
   * for a trial entitlement but has some trial days remaining. Possible error
   * codes: * PERMISSION_DENIED: The customer doesn't belong to the reseller. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: Entitlement resource not found. *
   * FAILED_PRECONDITION/NOT_IN_TRIAL: This method only works for entitlement on
   * trial plans. * INTERNAL: Any non-user error related to a technical issue in
   * the backend. Contact Cloud Channel support. * UNKNOWN: Any non-user error
   * related to a technical issue in the backend. Contact Cloud Channel support.
   * Return value: The ID of a long-running operation. To get the results of the
   * operation, call the GetOperation method of CloudChannelOperationsService. The
   * Operation metadata will contain an instance of OperationMetadata.
   * (entitlements.startPaidService)
   *
   * @param string $name Required. The name of the entitlement to start a paid
   * service for. Name uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1StartPaidServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function startPaidService($name, GoogleCloudChannelV1StartPaidServiceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startPaidService', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Suspends a previously fulfilled entitlement. An entitlement suspension is a
   * long-running operation. Possible error codes: * PERMISSION_DENIED: The
   * customer doesn't belong to the reseller. * INVALID_ARGUMENT: Required request
   * parameters are missing or invalid. * NOT_FOUND: Entitlement resource not
   * found. * NOT_ACTIVE: Entitlement is not active. * INTERNAL: Any non-user
   * error related to a technical issue in the backend. Contact Cloud Channel
   * support. * UNKNOWN: Any non-user error related to a technical issue in the
   * backend. Contact Cloud Channel support. Return value: The ID of a long-
   * running operation. To get the results of the operation, call the GetOperation
   * method of CloudChannelOperationsService. The Operation metadata will contain
   * an instance of OperationMetadata. (entitlements.suspend)
   *
   * @param string $name Required. The resource name of the entitlement to
   * suspend. Name uses the format:
   * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
   * @param GoogleCloudChannelV1SuspendEntitlementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function suspend($name, GoogleCloudChannelV1SuspendEntitlementRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('suspend', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsCustomersEntitlements::class, 'Google_Service_Cloudchannel_Resource_AccountsCustomersEntitlements');
