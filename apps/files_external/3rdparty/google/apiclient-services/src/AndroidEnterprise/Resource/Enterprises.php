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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\AdministratorWebToken;
use Google\Service\AndroidEnterprise\AdministratorWebTokenSpec;
use Google\Service\AndroidEnterprise\Enterprise;
use Google\Service\AndroidEnterprise\EnterpriseAccount;
use Google\Service\AndroidEnterprise\EnterprisesListResponse;
use Google\Service\AndroidEnterprise\EnterprisesSendTestPushNotificationResponse;
use Google\Service\AndroidEnterprise\NotificationSet;
use Google\Service\AndroidEnterprise\ServiceAccount;
use Google\Service\AndroidEnterprise\SignupInfo;
use Google\Service\AndroidEnterprise\StoreLayout;

/**
 * The "enterprises" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $enterprises = $androidenterpriseService->enterprises;
 *  </code>
 */
class Enterprises extends \Google\Service\Resource
{
  /**
   * Acknowledges notifications that were received from
   * Enterprises.PullNotificationSet to prevent subsequent calls from returning
   * the same notifications. (enterprises.acknowledgeNotificationSet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string notificationSetId The notification set ID as returned by
   * Enterprises.PullNotificationSet. This must be provided.
   */
  public function acknowledgeNotificationSet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('acknowledgeNotificationSet', [$params]);
  }
  /**
   * Completes the signup flow, by specifying the Completion token and Enterprise
   * token. This request must not be called multiple times for a given Enterprise
   * Token. (enterprises.completeSignup)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string completionToken The Completion token initially returned by
   * GenerateSignupUrl.
   * @opt_param string enterpriseToken The Enterprise token appended to the
   * Callback URL.
   * @return Enterprise
   */
  public function completeSignup($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('completeSignup', [$params], Enterprise::class);
  }
  /**
   * Returns a unique token to access an embeddable UI. To generate a web UI, pass
   * the generated token into the managed Google Play javascript API. Each token
   * may only be used to start one UI session. See the javascript API
   * documentation for further information. (enterprises.createWebToken)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param AdministratorWebTokenSpec $postBody
   * @param array $optParams Optional parameters.
   * @return AdministratorWebToken
   */
  public function createWebToken($enterpriseId, AdministratorWebTokenSpec $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createWebToken', [$params], AdministratorWebToken::class);
  }
  /**
   * Enrolls an enterprise with the calling EMM. (enterprises.enroll)
   *
   * @param string $token Required. The token provided by the enterprise to
   * register the EMM.
   * @param Enterprise $postBody
   * @param array $optParams Optional parameters.
   * @return Enterprise
   */
  public function enroll($token, Enterprise $postBody, $optParams = [])
  {
    $params = ['token' => $token, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('enroll', [$params], Enterprise::class);
  }
  /**
   * Generates a sign-up URL. (enterprises.generateSignupUrl)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string callbackUrl The callback URL to which the Admin will be
   * redirected after successfully creating an enterprise. Before redirecting
   * there the system will add a single query parameter to this URL named
   * "enterpriseToken" which will contain an opaque token to be used for the
   * CompleteSignup request. Beware that this means that the URL will be parsed,
   * the parameter added and then a new URL formatted, i.e. there may be some
   * minor formatting changes and, more importantly, the URL must be well-formed
   * so that it can be parsed.
   * @return SignupInfo
   */
  public function generateSignupUrl($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('generateSignupUrl', [$params], SignupInfo::class);
  }
  /**
   * Retrieves the name and domain of an enterprise. (enterprises.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Enterprise
   */
  public function get($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Enterprise::class);
  }
  /**
   * Returns a service account and credentials. The service account can be bound
   * to the enterprise by calling setAccount. The service account is unique to
   * this enterprise and EMM, and will be deleted if the enterprise is unbound.
   * The credentials contain private key data and are not stored server-side. This
   * method can only be called after calling Enterprises.Enroll or
   * Enterprises.CompleteSignup, and before Enterprises.SetAccount; at other times
   * it will return an error. Subsequent calls after the first will generate a
   * new, unique set of credentials, and invalidate the previously generated
   * credentials. Once the service account is bound to the enterprise, it can be
   * managed using the serviceAccountKeys resource.
   * (enterprises.getServiceAccount)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string keyType The type of credential to return with the service
   * account. Required.
   * @return ServiceAccount
   */
  public function getServiceAccount($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('getServiceAccount', [$params], ServiceAccount::class);
  }
  /**
   * Returns the store layout for the enterprise. If the store layout has not been
   * set, returns "basic" as the store layout type and no homepage.
   * (enterprises.getStoreLayout)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return StoreLayout
   */
  public function getStoreLayout($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('getStoreLayout', [$params], StoreLayout::class);
  }
  /**
   * Looks up an enterprise by domain name. This is only supported for enterprises
   * created via the Google-initiated creation flow. Lookup of the id is not
   * needed for enterprises created via the EMM-initiated flow since the EMM
   * learns the enterprise ID in the callback specified in the
   * Enterprises.generateSignupUrl call. (enterprises.listEnterprises)
   *
   * @param string $domain Required. The exact primary domain name of the
   * enterprise to look up.
   * @param array $optParams Optional parameters.
   * @return EnterprisesListResponse
   */
  public function listEnterprises($domain, $optParams = [])
  {
    $params = ['domain' => $domain];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], EnterprisesListResponse::class);
  }
  /**
   * Pulls and returns a notification set for the enterprises associated with the
   * service account authenticated for the request. The notification set may be
   * empty if no notification are pending. A notification set returned needs to be
   * acknowledged within 20 seconds by calling
   * Enterprises.AcknowledgeNotificationSet, unless the notification set is empty.
   * Notifications that are not acknowledged within the 20 seconds will eventually
   * be included again in the response to another PullNotificationSet request, and
   * those that are never acknowledged will ultimately be deleted according to the
   * Google Cloud Platform Pub/Sub system policy. Multiple requests might be
   * performed concurrently to retrieve notifications, in which case the pending
   * notifications (if any) will be split among each caller, if any are pending.
   * If no notifications are present, an empty notification list is returned.
   * Subsequent requests may return more notifications once they become available.
   * (enterprises.pullNotificationSet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMode The request mode for pulling notifications.
   * Specifying waitForNotifications will cause the request to block and wait
   * until one or more notifications are present, or return an empty notification
   * list if no notifications are present after some time. Speciying
   * returnImmediately will cause the request to immediately return the pending
   * notifications, or an empty list if no notifications are present. If omitted,
   * defaults to waitForNotifications.
   * @return NotificationSet
   */
  public function pullNotificationSet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('pullNotificationSet', [$params], NotificationSet::class);
  }
  /**
   * Sends a test notification to validate the EMM integration with the Google
   * Cloud Pub/Sub service for this enterprise.
   * (enterprises.sendTestPushNotification)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return EnterprisesSendTestPushNotificationResponse
   */
  public function sendTestPushNotification($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('sendTestPushNotification', [$params], EnterprisesSendTestPushNotificationResponse::class);
  }
  /**
   * Sets the account that will be used to authenticate to the API as the
   * enterprise. (enterprises.setAccount)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param EnterpriseAccount $postBody
   * @param array $optParams Optional parameters.
   * @return EnterpriseAccount
   */
  public function setAccount($enterpriseId, EnterpriseAccount $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAccount', [$params], EnterpriseAccount::class);
  }
  /**
   * Sets the store layout for the enterprise. By default, storeLayoutType is set
   * to "basic" and the basic store layout is enabled. The basic layout only
   * contains apps approved by the admin, and that have been added to the
   * available product set for a user (using the setAvailableProductSet call).
   * Apps on the page are sorted in order of their product ID value. If you create
   * a custom store layout (by setting storeLayoutType = "custom" and setting a
   * homepage), the basic store layout is disabled. (enterprises.setStoreLayout)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param StoreLayout $postBody
   * @param array $optParams Optional parameters.
   * @return StoreLayout
   */
  public function setStoreLayout($enterpriseId, StoreLayout $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setStoreLayout', [$params], StoreLayout::class);
  }
  /**
   * Unenrolls an enterprise from the calling EMM. (enterprises.unenroll)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   */
  public function unenroll($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('unenroll', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Enterprises::class, 'Google_Service_AndroidEnterprise_Resource_Enterprises');
