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
 * The "admin" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $admin = $apigeeService->admin;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsAnalyticsAdmin extends Google_Service_Resource
{
  /**
   * Get a list of metrics and dimensions which can be used for creating analytics
   * queries and reports. Each schema element contains the name of the field with
   * its associated type and if it is either custom field or standard field.
   * (admin.getSchemav2)
   *
   * @param string $name Required. The parent organization and environment names.
   * Must be of the form
   * `organizations/{org}/environments/{env}/analytics/admin/schemav2`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type Required. Type refers to the dataset name whose schema
   * needs to be retrieved E.g. type=fact or type=agg_cus1
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Schema
   */
  public function getSchemav2($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getSchemav2', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Schema");
  }
}
