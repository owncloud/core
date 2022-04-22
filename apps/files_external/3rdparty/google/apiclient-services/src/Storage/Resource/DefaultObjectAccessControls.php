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

namespace Google\Service\Storage\Resource;

use Google\Service\Storage\ObjectAccessControl;
use Google\Service\Storage\ObjectAccessControls as ObjectAccessControlsModel;

/**
 * The "defaultObjectAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $defaultObjectAccessControls = $storageService->defaultObjectAccessControls;
 *  </code>
 */
class DefaultObjectAccessControls extends \Google\Service\Resource
{
  /**
   * Permanently deletes the default object ACL entry for the specified entity on
   * the specified bucket. (defaultObjectAccessControls.delete)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $entity, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns the default object ACL entry for the specified entity on the
   * specified bucket. (defaultObjectAccessControls.get)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function get($bucket, $entity, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ObjectAccessControl::class);
  }
  /**
   * Creates a new default object ACL entry on the specified bucket.
   * (defaultObjectAccessControls.insert)
   *
   * @param string $bucket Name of a bucket.
   * @param ObjectAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function insert($bucket, ObjectAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], ObjectAccessControl::class);
  }
  /**
   * Retrieves default object ACL entries on the specified bucket.
   * (defaultObjectAccessControls.listDefaultObjectAccessControls)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch If present, only return default ACL
   * listing if the bucket's current metageneration matches this value.
   * @opt_param string ifMetagenerationNotMatch If present, only return default
   * ACL listing if the bucket's current metageneration does not match the given
   * value.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControls
   */
  public function listDefaultObjectAccessControls($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ObjectAccessControlsModel::class);
  }
  /**
   * Patches a default object ACL entry on the specified bucket.
   * (defaultObjectAccessControls.patch)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param ObjectAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function patch($bucket, $entity, ObjectAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ObjectAccessControl::class);
  }
  /**
   * Updates a default object ACL entry on the specified bucket.
   * (defaultObjectAccessControls.update)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param ObjectAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function update($bucket, $entity, ObjectAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ObjectAccessControl::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DefaultObjectAccessControls::class, 'Google_Service_Storage_Resource_DefaultObjectAccessControls');
