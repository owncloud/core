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
 * The "policySchemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromepolicyService = new Google_Service_ChromePolicy(...);
 *   $policySchemas = $chromepolicyService->policySchemas;
 *  </code>
 */
class Google_Service_ChromePolicy_Resource_CustomersPolicySchemas extends Google_Service_Resource
{
  /**
   * Get a specific policy schema for a customer by its resource name.
   * (policySchemas.get)
   *
   * @param string $name Required. The policy schema resource name to query.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchema
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchema");
  }
  /**
   * Gets a list of policy schemas that match a specified filter value for a given
   * customer. (policySchemas.listCustomersPolicySchemas)
   *
   * @param string $parent Required. The customer for which the listing request
   * will apply.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The schema filter used to find a particular schema
   * based on fields like its resource name, description and
   * `additionalTargetKeyNames`.
   * @opt_param int pageSize The maximum number of policy schemas to return.
   * @opt_param string pageToken The page token used to retrieve a specific page
   * of the listing request.
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1ListPolicySchemasResponse
   */
  public function listCustomersPolicySchemas($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ChromePolicy_GoogleChromePolicyV1ListPolicySchemasResponse");
  }
}
