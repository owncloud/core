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
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iapService = new Google_Service_CloudIAP(...);
 *   $v1 = $iapService->v1;
 *  </code>
 */
class Google_Service_CloudIAP_Resource_V1 extends Google_Service_Resource
{
  /**
   * Gets the access control policy for an Identity-Aware Proxy protected
   * resource. More information about managing access via IAP can be found at:
   * https://cloud.google.com/iap/docs/managing-access#managing_access_via_the_api
   * (v1.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudIAP_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_Policy
   */
  public function getIamPolicy($resource, Google_Service_CloudIAP_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudIAP_Policy");
  }
  /**
   * Gets the IAP settings on a particular IAP protected resource.
   * (v1.getIapSettings)
   *
   * @param string $name Required. The resource name for which to retrieve the
   * settings. Authorization: Requires the `getSettings` permission for the
   * associated resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_IapSettings
   */
  public function getIapSettings($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getIapSettings', array($params), "Google_Service_CloudIAP_IapSettings");
  }
  /**
   * Sets the access control policy for an Identity-Aware Proxy protected
   * resource. Replaces any existing policy. More information about managing
   * access via IAP can be found at: https://cloud.google.com/iap/docs/managing-
   * access#managing_access_via_the_api (v1.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudIAP_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudIAP_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudIAP_Policy");
  }
  /**
   * Returns permissions that a caller has on the Identity-Aware Proxy protected
   * resource. More information about managing access via IAP can be found at:
   * https://cloud.google.com/iap/docs/managing-access#managing_access_via_the_api
   * (v1.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudIAP_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudIAP_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudIAP_TestIamPermissionsResponse");
  }
  /**
   * Updates the IAP settings on a particular IAP protected resource. It replaces
   * all fields unless the `update_mask` is set. (v1.updateIapSettings)
   *
   * @param string $name Required. The resource name of the IAP protected
   * resource.
   * @param Google_Service_CloudIAP_IapSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask specifying which IAP settings
   * should be updated. If omitted, the all of the settings are updated. See
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_CloudIAP_IapSettings
   */
  public function updateIapSettings($name, Google_Service_CloudIAP_IapSettings $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateIapSettings', array($params), "Google_Service_CloudIAP_IapSettings");
  }
}
