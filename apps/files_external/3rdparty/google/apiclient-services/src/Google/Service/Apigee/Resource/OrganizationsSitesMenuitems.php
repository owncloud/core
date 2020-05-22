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
 * The "menuitems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $menuitems = $apigeeService->menuitems;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesMenuitems extends Google_Service_Resource
{
  /**
   * Creates a menu item. (menuitems.create)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1MenuItemData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1MenuItem
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1MenuItemData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1MenuItem");
  }
  /**
   * Deletes a menu item. (menuitems.delete)
   *
   * @param string $name Required. Name of the menu item. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/menuitems/{menuitem}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Lists all menu items. (menuitems.listOrganizationsSitesMenuitems)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListMenuItemsResponse
   */
  public function listOrganizationsSitesMenuitems($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListMenuItemsResponse");
  }
  /**
   * Lists the menu items for a menu type. (menuitems.listItemsByType)
   *
   * @param string $name Required. Name of the menu item. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/menuitems/{menuitem}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListMenuItemsResponse
   */
  public function listItemsByType($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('listItemsByType', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListMenuItemsResponse");
  }
  /**
   * Publishes all menu items. (menuitems.publish)
   *
   * @param string $parent Required. Use the following structure in your request:
   * `organizations/{org}/sites/{site}/menuitems`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function publish($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Updates a menu item. (menuitems.update)
   *
   * @param string $name Required. Name of the menu item. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/menuitems/{menuitem}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1MenuItemData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1MenuItem
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1MenuItemData $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1MenuItem");
  }
}
