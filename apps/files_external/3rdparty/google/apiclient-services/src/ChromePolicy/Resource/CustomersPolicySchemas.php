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

namespace Google\Service\ChromePolicy\Resource;

use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1ListPolicySchemasResponse;
use Google\Service\ChromePolicy\GoogleChromePolicyVersionsV1PolicySchema;

/**
 * The "policySchemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromepolicyService = new Google\Service\ChromePolicy(...);
 *   $policySchemas = $chromepolicyService->policySchemas;
 *  </code>
 */
class CustomersPolicySchemas extends \Google\Service\Resource
{
  /**
   * Get a specific policy schema for a customer by its resource name.
   * (policySchemas.get)
   *
   * @param string $name Required. The policy schema resource name to query.
   * @param array $optParams Optional parameters.
   * @return GoogleChromePolicyVersionsV1PolicySchema
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleChromePolicyVersionsV1PolicySchema::class);
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
   * @opt_param int pageSize The maximum number of policy schemas to return,
   * defaults to 100 and has a maximum of 1000.
   * @opt_param string pageToken The page token used to retrieve a specific page
   * of the listing request.
   * @return GoogleChromePolicyVersionsV1ListPolicySchemasResponse
   */
  public function listCustomersPolicySchemas($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleChromePolicyVersionsV1ListPolicySchemasResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersPolicySchemas::class, 'Google_Service_ChromePolicy_Resource_CustomersPolicySchemas');
