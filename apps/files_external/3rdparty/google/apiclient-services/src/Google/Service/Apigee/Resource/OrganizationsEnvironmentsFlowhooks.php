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
 * The "flowhooks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $flowhooks = $apigeeService->flowhooks;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsFlowhooks extends Google_Service_Resource
{
  /**
   * Attaches a shared flow to a flow hook. (flowhooks.attachSharedFlowToFlowHook)
   *
   * @param string $name Required. Name of the flow hook to which the shared flow
   * should be attached in the following format:
   * `organizations/{org}/environments/{env}/flowhooks/{flowhook}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1FlowHook $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1FlowHook
   */
  public function attachSharedFlowToFlowHook($name, Google_Service_Apigee_GoogleCloudApigeeV1FlowHook $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('attachSharedFlowToFlowHook', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1FlowHook");
  }
  /**
   * Detaches a shared flow from a flow hook.
   * (flowhooks.detachSharedFlowFromFlowHook)
   *
   * @param string $name Required. Name of the flow hook to detach in the
   * following format:
   * `organizations/{org}/environments/{env}/flowhooks/{flowhook}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1FlowHook
   */
  public function detachSharedFlowFromFlowHook($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('detachSharedFlowFromFlowHook', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1FlowHook");
  }
  /**
   * Returns the name of the shared flow attached to the specified flow hook. If
   * there's no shared flow attached to the flow hook, the API does not return an
   * error; it simply does not return a name in the response. (flowhooks.get)
   *
   * @param string $name Required. Name of the flow hook in the following format:
   * `organizations/{org}/environments/{env}/flowhooks/{flowhook}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1FlowHook
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1FlowHook");
  }
  /**
   * Lists the flow hooks attached to an environment. This API always returns:
   * `["PreProxyFlowHook", "PostProxyFlowHook", "PreTargetFlowHook",
   * "PostTargetFlowHook"]` (flowhooks.listOrganizationsEnvironmentsFlowhooks)
   *
   * @param string $parent Required. Name of the environment for which to display
   * flow hooks in the following format:
   * `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_ListResponse
   */
  public function listOrganizationsEnvironmentsFlowhooks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_ListResponse");
  }
}
