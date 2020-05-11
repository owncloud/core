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
 * The "customcss" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $customcss = $apigeeService->customcss;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesCustomcss extends Google_Service_Resource
{
  /**
   * Gets the information required for the theme editor.
   * (customcss.getEditorschema)
   *
   * @param string $parent Required. Name for the custom CSS. Use the following
   * structure in your request:   `organizations/{org}/sites/customcss`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1EditorSchema
   */
  public function getEditorschema($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getEditorschema', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1EditorSchema");
  }
  /**
   * Publishes the custom CSS for a portal (customcss.publish)
   *
   * @param string $parent Required. Name for the custom CSS. Use the following
   * structure in your request:   `organizations/{org}/sites/customcss`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function publish($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
}
