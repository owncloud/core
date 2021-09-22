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

namespace Google\Service\Vault\Resource;

use Google\Service\Vault\AddMatterPermissionsRequest;
use Google\Service\Vault\CloseMatterRequest;
use Google\Service\Vault\CloseMatterResponse;
use Google\Service\Vault\CountArtifactsRequest;
use Google\Service\Vault\ListMattersResponse;
use Google\Service\Vault\Matter;
use Google\Service\Vault\MatterPermission;
use Google\Service\Vault\Operation;
use Google\Service\Vault\RemoveMatterPermissionsRequest;
use Google\Service\Vault\ReopenMatterRequest;
use Google\Service\Vault\ReopenMatterResponse;
use Google\Service\Vault\UndeleteMatterRequest;
use Google\Service\Vault\VaultEmpty;

/**
 * The "matters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google\Service\Vault(...);
 *   $matters = $vaultService->matters;
 *  </code>
 */
class Matters extends \Google\Service\Resource
{
  /**
   * Adds an account as a matter collaborator. (matters.addPermissions)
   *
   * @param string $matterId The matter ID.
   * @param AddMatterPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MatterPermission
   */
  public function addPermissions($matterId, AddMatterPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addPermissions', [$params], MatterPermission::class);
  }
  /**
   * Closes the specified matter. Returns the matter with updated state.
   * (matters.close)
   *
   * @param string $matterId The matter ID.
   * @param CloseMatterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CloseMatterResponse
   */
  public function close($matterId, CloseMatterRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('close', [$params], CloseMatterResponse::class);
  }
  /**
   * Counts the accounts processed by the specified query. (matters.count)
   *
   * @param string $matterId The matter ID.
   * @param CountArtifactsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function count($matterId, CountArtifactsRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('count', [$params], Operation::class);
  }
  /**
   * Creates a matter with the given name and description. The initial state is
   * open, and the owner is the method caller. Returns the created matter with
   * default view. (matters.create)
   *
   * @param Matter $postBody
   * @param array $optParams Optional parameters.
   * @return Matter
   */
  public function create(Matter $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Matter::class);
  }
  /**
   * Deletes the specified matter. Returns the matter with updated state.
   * (matters.delete)
   *
   * @param string $matterId The matter ID
   * @param array $optParams Optional parameters.
   * @return Matter
   */
  public function delete($matterId, $optParams = [])
  {
    $params = ['matterId' => $matterId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Matter::class);
  }
  /**
   * Gets the specified matter. (matters.get)
   *
   * @param string $matterId The matter ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies how much information about the matter to
   * return in the response.
   * @return Matter
   */
  public function get($matterId, $optParams = [])
  {
    $params = ['matterId' => $matterId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Matter::class);
  }
  /**
   * Lists matters the requestor has access to. (matters.listMatters)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of matters to return in the response.
   * Default and maximum are 100.
   * @opt_param string pageToken The pagination token as returned in the response.
   * @opt_param string state If set, lists only matters with the specified state.
   * The default lists matters of all states.
   * @opt_param string view Specifies how much information about the matter to
   * return in response.
   * @return ListMattersResponse
   */
  public function listMatters($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMattersResponse::class);
  }
  /**
   * Removes an account as a matter collaborator. (matters.removePermissions)
   *
   * @param string $matterId The matter ID.
   * @param RemoveMatterPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VaultEmpty
   */
  public function removePermissions($matterId, RemoveMatterPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removePermissions', [$params], VaultEmpty::class);
  }
  /**
   * Reopens the specified matter. Returns the matter with updated state.
   * (matters.reopen)
   *
   * @param string $matterId The matter ID.
   * @param ReopenMatterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ReopenMatterResponse
   */
  public function reopen($matterId, ReopenMatterRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reopen', [$params], ReopenMatterResponse::class);
  }
  /**
   * Undeletes the specified matter. Returns the matter with updated state.
   * (matters.undelete)
   *
   * @param string $matterId The matter ID.
   * @param UndeleteMatterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Matter
   */
  public function undelete($matterId, UndeleteMatterRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Matter::class);
  }
  /**
   * Updates the specified matter. This updates only the name and description of
   * the matter, identified by matter ID. Changes to any other fields are ignored.
   * Returns the default view of the matter. (matters.update)
   *
   * @param string $matterId The matter ID.
   * @param Matter $postBody
   * @param array $optParams Optional parameters.
   * @return Matter
   */
  public function update($matterId, Matter $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Matter::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Matters::class, 'Google_Service_Vault_Resource_Matters');
