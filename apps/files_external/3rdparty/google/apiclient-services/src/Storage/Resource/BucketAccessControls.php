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

use Google\Service\Storage\BucketAccessControl;
use Google\Service\Storage\BucketAccessControls as BucketAccessControlsModel;

/**
 * The "bucketAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $bucketAccessControls = $storageService->bucketAccessControls;
 *  </code>
 */
class BucketAccessControls extends \Google\Service\Resource
{
  /**
   * Permanently deletes the ACL entry for the specified entity on the specified
   * bucket. (bucketAccessControls.delete)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
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
   * Returns the ACL entry for the specified entity on the specified bucket.
   * (bucketAccessControls.get)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return BucketAccessControl
   */
  public function get($bucket, $entity, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BucketAccessControl::class);
  }
  /**
   * Creates a new ACL entry on the specified bucket.
   * (bucketAccessControls.insert)
   *
   * @param string $bucket Name of a bucket.
   * @param BucketAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return BucketAccessControl
   */
  public function insert($bucket, BucketAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], BucketAccessControl::class);
  }
  /**
   * Retrieves ACL entries on the specified bucket.
   * (bucketAccessControls.listBucketAccessControls)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return BucketAccessControlsModel
   */
  public function listBucketAccessControls($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BucketAccessControlsModel::class);
  }
  /**
   * Patches an ACL entry on the specified bucket. (bucketAccessControls.patch)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param BucketAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return BucketAccessControl
   */
  public function patch($bucket, $entity, BucketAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], BucketAccessControl::class);
  }
  /**
   * Updates an ACL entry on the specified bucket. (bucketAccessControls.update)
   *
   * @param string $bucket Name of a bucket.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param BucketAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return BucketAccessControl
   */
  public function update($bucket, $entity, BucketAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], BucketAccessControl::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketAccessControls::class, 'Google_Service_Storage_Resource_BucketAccessControls');
