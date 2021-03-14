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
 * The "overrides" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $overrides = $apigeeService->overrides;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsTraceConfigOverrides extends Google_Service_Resource
{
  /**
   * Creates a trace configuration override. The response contains a system-
   * generated UUID, that can be used to view, update, or delete the configuration
   * override. Use the List API to view the existing trace configuration
   * overrides. (overrides.create)
   *
   * @param string $parent Required. Parent resource of the trace configuration
   * override. Use the following structure in your request.
   * "organizations/environments/traceConfig".
   * @param Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride");
  }
  /**
   * Deletes a distributed trace configuration override. (overrides.delete)
   *
   * @param string $name Required. Name of the trace configuration override. Use
   * the following structure in your request:
   * "organizations/environments/traceConfig/overrides".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
  /**
   * Gets a trace configuration override. (overrides.get)
   *
   * @param string $name Required. Name of the trace configuration override. Use
   * the following structure in your request:
   * "organizations/environments/traceConfig/overrides".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride");
  }
  /**
   * Lists all of the distributed trace configuration overrides in an environment.
   * (overrides.listOrganizationsEnvironmentsTraceConfigOverrides)
   *
   * @param string $parent Required. Parent resource of the trace configuration
   * override. Use the following structure in your request:
   * "organizations/environments/traceConfig".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of trace configuration overrides to
   * return. If not specified, the maximum number returned is 25. The maximum
   * number cannot exceed 100.
   * @opt_param string pageToken A page token, returned from a previous
   * `ListTraceConfigOverrides` call. Token value that can be used to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListTraceConfigOverrides` must match those specified in the call to obtain
   * the page token.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListTraceConfigOverridesResponse
   */
  public function listOrganizationsEnvironmentsTraceConfigOverrides($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListTraceConfigOverridesResponse");
  }
  /**
   * Updates a distributed trace configuration override. Note that the repeated
   * fields have replace semantics when included in the field mask and that they
   * will be overwritten by the value of the fields in the request body.
   * (overrides.patch)
   *
   * @param string $name Required. Name of the trace configuration override. Use
   * the following structure in your request:
   * "organizations/environments/traceConfig/overrides".
   * @param Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride
   */
  public function patch($name, Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride");
  }
}
