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

namespace Google\Service\TagManager\Resource;

use Google\Service\TagManager\ContainerVersion;
use Google\Service\TagManager\PublishContainerVersionResponse;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $versions = $tagmanagerService->versions;
 *  </code>
 */
class AccountsContainersVersions extends \Google\Service\Resource
{
  /**
   * Deletes a Container Version. (versions.delete)
   *
   * @param string $path GTM ContainerVersion's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/versions/{version_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a Container Version. (versions.get)
   *
   * @param string $path GTM ContainerVersion's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/versions/{version_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string containerVersionId The GTM ContainerVersion ID. Specify
   * published to retrieve the currently published version.
   * @return ContainerVersion
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ContainerVersion::class);
  }
  /**
   * Gets the live (i.e. published) container version (versions.live)
   *
   * @param string $parent GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   * @return ContainerVersion
   */
  public function live($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('live', [$params], ContainerVersion::class);
  }
  /**
   * Publishes a Container Version. (versions.publish)
   *
   * @param string $path GTM ContainerVersion's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/versions/{version_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the container version in storage.
   * @return PublishContainerVersionResponse
   */
  public function publish($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('publish', [$params], PublishContainerVersionResponse::class);
  }
  /**
   * Sets the latest version used for synchronization of workspaces when detecting
   * conflicts and errors. (versions.set_latest)
   *
   * @param string $path GTM ContainerVersion's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/versions/{version_id}
   * @param array $optParams Optional parameters.
   * @return ContainerVersion
   */
  public function set_latest($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('set_latest', [$params], ContainerVersion::class);
  }
  /**
   * Undeletes a Container Version. (versions.undelete)
   *
   * @param string $path GTM ContainerVersion's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/versions/{version_id}
   * @param array $optParams Optional parameters.
   * @return ContainerVersion
   */
  public function undelete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], ContainerVersion::class);
  }
  /**
   * Updates a Container Version. (versions.update)
   *
   * @param string $path GTM ContainerVersion's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/versions/{version_id}
   * @param ContainerVersion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the container version in storage.
   * @return ContainerVersion
   */
  public function update($path, ContainerVersion $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ContainerVersion::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersVersions::class, 'Google_Service_TagManager_Resource_AccountsContainersVersions');
