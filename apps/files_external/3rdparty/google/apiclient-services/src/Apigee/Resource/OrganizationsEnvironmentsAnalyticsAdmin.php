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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1Schema;

/**
 * The "admin" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $admin = $apigeeService->admin;
 *  </code>
 */
class OrganizationsEnvironmentsAnalyticsAdmin extends \Google\Service\Resource
{
  /**
   * Gets a list of metrics and dimensions that can be used to create analytics
   * queries and reports. Each schema element contains the name of the field, its
   * associated type, and a flag indicating whether it is a standard or custom
   * field. (admin.getSchemav2)
   *
   * @param string $name Required. Path to the schema. Use the following structure
   * in your request:
   * `organizations/{org}/environments/{env}/analytics/admin/schemav2`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool disableCache Flag that specifies whether the schema is be
   * read from the database or cache. Set to `true` to read the schema from the
   * database. Defaults to cache.
   * @opt_param string type Required. Name of the dataset for which you want to
   * retrieve the schema. For example: `fact` or `agg_cus1`
   * @return GoogleCloudApigeeV1Schema
   */
  public function getSchemav2($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getSchemav2', [$params], GoogleCloudApigeeV1Schema::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsAnalyticsAdmin::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsAnalyticsAdmin');
