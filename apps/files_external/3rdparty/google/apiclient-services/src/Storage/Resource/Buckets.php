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

use Google\Service\Storage\Bucket;
use Google\Service\Storage\Buckets as BucketsModel;
use Google\Service\Storage\Policy;
use Google\Service\Storage\TestIamPermissionsResponse;

/**
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $buckets = $storageService->buckets;
 *  </code>
 */
class Buckets extends \Google\Service\Resource
{
  /**
   * Permanently deletes an empty bucket. (buckets.delete)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch If set, only deletes the bucket if
   * its metageneration matches this value.
   * @opt_param string ifMetagenerationNotMatch If set, only deletes the bucket if
   * its metageneration does not match this value.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns metadata for the specified bucket. (buckets.get)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration matches
   * the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration does not
   * match the given value.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Bucket
   */
  public function get($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Bucket::class);
  }
  /**
   * Returns an IAM policy for the specified bucket. (buckets.getIamPolicy)
   *
   * @param string $bucket Name of a bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion The IAM policy format version to
   * be returned. If the optionsRequestedPolicyVersion is for an older version
   * that doesn't support part of the requested IAM policy, the request fails.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Policy
   */
  public function getIamPolicy($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Creates a new bucket. (buckets.insert)
   *
   * @param string $project A valid API project identifier.
   * @param Bucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this bucket.
   * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
   * default object access controls to this bucket.
   * @opt_param string projection Set of properties to return. Defaults to noAcl,
   * unless the bucket resource specifies acl or defaultObjectAcl properties, when
   * it defaults to full.
   * @opt_param string userProject The project to be billed for this request.
   * @return Bucket
   */
  public function insert($project, Bucket $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Bucket::class);
  }
  /**
   * Retrieves a list of buckets for a given project. (buckets.listBuckets)
   *
   * @param string $project A valid API project identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of buckets to return in a single
   * response. The service will use this parameter or 1,000 items, whichever is
   * smaller.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @opt_param string prefix Filter results to buckets whose names begin with
   * this prefix.
   * @opt_param string projection Set of properties to return. Defaults to noAcl.
   * @opt_param string userProject The project to be billed for this request.
   * @return BucketsModel
   */
  public function listBuckets($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BucketsModel::class);
  }
  /**
   * Locks retention policy on a bucket. (buckets.lockRetentionPolicy)
   *
   * @param string $bucket Name of a bucket.
   * @param string $ifMetagenerationMatch Makes the operation conditional on
   * whether bucket's current metageneration matches the given value.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Bucket
   */
  public function lockRetentionPolicy($bucket, $ifMetagenerationMatch, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'ifMetagenerationMatch' => $ifMetagenerationMatch];
    $params = array_merge($params, $optParams);
    return $this->call('lockRetentionPolicy', [$params], Bucket::class);
  }
  /**
   * Patches a bucket. Changes to the bucket will be readable immediately after
   * writing, but configuration changes may take time to propagate.
   * (buckets.patch)
   *
   * @param string $bucket Name of a bucket.
   * @param Bucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration matches
   * the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration does not
   * match the given value.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this bucket.
   * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
   * default object access controls to this bucket.
   * @opt_param string projection Set of properties to return. Defaults to full.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Bucket
   */
  public function patch($bucket, Bucket $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Bucket::class);
  }
  /**
   * Updates an IAM policy for the specified bucket. (buckets.setIamPolicy)
   *
   * @param string $bucket Name of a bucket.
   * @param Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Policy
   */
  public function setIamPolicy($bucket, Policy $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Tests a set of permissions on the given bucket to see which, if any, are held
   * by the caller. (buckets.testIamPermissions)
   *
   * @param string $bucket Name of a bucket.
   * @param string|array $permissions Permissions to test.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($bucket, $permissions, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'permissions' => $permissions];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
  /**
   * Updates a bucket. Changes to the bucket will be readable immediately after
   * writing, but configuration changes may take time to propagate.
   * (buckets.update)
   *
   * @param string $bucket Name of a bucket.
   * @param Bucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ifMetagenerationMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration matches
   * the given value.
   * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
   * metadata conditional on whether the bucket's current metageneration does not
   * match the given value.
   * @opt_param string predefinedAcl Apply a predefined set of access controls to
   * this bucket.
   * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
   * default object access controls to this bucket.
   * @opt_param string projection Set of properties to return. Defaults to full.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Bucket
   */
  public function update($bucket, Bucket $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Bucket::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Buckets::class, 'Google_Service_Storage_Resource_Buckets');
