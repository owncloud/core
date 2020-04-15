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
 * The "email" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $email = $apigeeService->email;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesEmail extends Google_Service_Resource
{
  /**
   * Gets an email template for a portal. (email.get)
   *
   * @param string $name Required. Name of the email template. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}/email/{email}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplate
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplate");
  }
  /**
   * Updates an email template for a portal. (email.update)
   *
   * @param string $name Required. Name of the email template. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}/email/{email}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplateBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplate
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplateBody $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplate");
  }
}
