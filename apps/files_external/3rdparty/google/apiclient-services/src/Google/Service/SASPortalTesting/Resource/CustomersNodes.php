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
 * The "nodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $prod_tt_sasportalService = new Google_Service_SASPortalTesting(...);
 *   $nodes = $prod_tt_sasportalService->nodes;
 *  </code>
 */
class Google_Service_SASPortalTesting_Resource_CustomersNodes extends Google_Service_Resource
{
  /**
   * Creates a new node. (nodes.create)
   *
   * @param string $parent Required. The parent resource name where the node is to
   * be created.
   * @param Google_Service_SASPortalTesting_SasPortalNode $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalNode
   */
  public function create($parent, Google_Service_SASPortalTesting_SasPortalNode $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_SASPortalTesting_SasPortalNode");
  }
  /**
   * Deletes a node. (nodes.delete)
   *
   * @param string $name Required. The name of the node.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_SASPortalTesting_SasPortalEmpty");
  }
  /**
   * Returns a requested node. (nodes.get)
   *
   * @param string $name Required. The name of the node.
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalNode
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SASPortalTesting_SasPortalNode");
  }
  /**
   * Lists nodes. (nodes.listCustomersNodes)
   *
   * @param string $parent Required. The parent resource name, for example,
   * "nodes/1".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of nodes to return in the
   * response.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListNodes method that indicates where this listing should continue from.
   * @return Google_Service_SASPortalTesting_SasPortalListNodesResponse
   */
  public function listCustomersNodes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SASPortalTesting_SasPortalListNodesResponse");
  }
  /**
   * Moves a node under another node or customer. (nodes.move)
   *
   * @param string $name Required. The name of the node to move.
   * @param Google_Service_SASPortalTesting_SasPortalMoveNodeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalOperation
   */
  public function move($name, Google_Service_SASPortalTesting_SasPortalMoveNodeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_SASPortalTesting_SasPortalOperation");
  }
  /**
   * Updates an existing node. (nodes.patch)
   *
   * @param string $name Output only. Resource name.
   * @param Google_Service_SASPortalTesting_SasPortalNode $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated.
   * @return Google_Service_SASPortalTesting_SasPortalNode
   */
  public function patch($name, Google_Service_SASPortalTesting_SasPortalNode $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SASPortalTesting_SasPortalNode");
  }
}
