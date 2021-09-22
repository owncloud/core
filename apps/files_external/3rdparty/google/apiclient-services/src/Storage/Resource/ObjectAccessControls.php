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
 * The "objectAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $objectAccessControls = $storageService->objectAccessControls;
 *  </code>
 */
class ObjectAccessControls extends \Google\Service\Resource
{
  /**
   * Permanently deletes the ACL entry for the specified entity on the specified
   * object. (objectAccessControls.delete)
   *
   * @param string $bucket Name of a bucket.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $object, $entity, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns the ACL entry for the specified entity on the specified object.
   * (objectAccessControls.get)
   *
   * @param string $bucket Name of a bucket.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function get($bucket, $object, $entity, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ObjectAccessControl::class);
  }
  /**
   * Creates a new ACL entry on the specified object.
   * (objectAccessControls.insert)
   *
   * @param string $bucket Name of a bucket.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param ObjectAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function insert($bucket, $object, ObjectAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], ObjectAccessControl::class);
  }
  /**
   * Retrieves ACL entries on the specified object.
   * (objectAccessControls.listObjectAccessControls)
   *
   * @param string $bucket Name of a bucket.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControlsModel
   */
  public function listObjectAccessControls($bucket, $object, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ObjectAccessControlsModel::class);
  }
  /**
   * Patches an ACL entry on the specified object. (objectAccessControls.patch)
   *
   * @param string $bucket Name of a bucket.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param ObjectAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function patch($bucket, $object, $entity, ObjectAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ObjectAccessControl::class);
  }
  /**
   * Updates an ACL entry on the specified object. (objectAccessControls.update)
   *
   * @param string $bucket Name of a bucket.
   * @param string $object Name of the object. For information about how to URL
   * encode object names to be path safe, see Encoding URI Path Parts.
   * @param string $entity The entity holding the permission. Can be user-userId,
   * user-emailAddress, group-groupId, group-emailAddress, allUsers, or
   * allAuthenticatedUsers.
   * @param ObjectAccessControl $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string generation If present, selects a specific revision of this
   * object (as opposed to the latest version, the default).
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return ObjectAccessControl
   */
  public function update($bucket, $object, $entity, ObjectAccessControl $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ObjectAccessControl::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ObjectAccessControls::class, 'Google_Service_Storage_Resource_ObjectAccessControls');
