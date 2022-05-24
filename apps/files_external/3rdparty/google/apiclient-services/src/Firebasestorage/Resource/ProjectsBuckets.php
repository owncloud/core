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

namespace Google\Service\Firebasestorage\Resource;

use Google\Service\Firebasestorage\AddFirebaseRequest;
use Google\Service\Firebasestorage\Bucket;
use Google\Service\Firebasestorage\FirebasestorageEmpty;
use Google\Service\Firebasestorage\ListBucketsResponse;
use Google\Service\Firebasestorage\RemoveFirebaseRequest;

/**
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasestorageService = new Google\Service\Firebasestorage(...);
 *   $buckets = $firebasestorageService->buckets;
 *  </code>
 */
class ProjectsBuckets extends \Google\Service\Resource
{
  /**
   * Links a Google Cloud Storage bucket to a Firebase project.
   * (buckets.addFirebase)
   *
   * @param string $bucket Required. Resource name of the bucket, mirrors the ID
   * of the underlying Google Cloud Storage bucket,
   * `projects/{project_number}/buckets/{bucket_id}`.
   * @param AddFirebaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Bucket
   */
  public function addFirebase($bucket, AddFirebaseRequest $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addFirebase', [$params], Bucket::class);
  }
  /**
   * Gets a single linked storage bucket. (buckets.get)
   *
   * @param string $name Required. Resource name of the bucket, mirrors the ID of
   * the underlying Google Cloud Storage bucket,
   * `projects/{project_number}/buckets/{bucket_id}`.
   * @param array $optParams Optional parameters.
   * @return Bucket
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Bucket::class);
  }
  /**
   * Lists the linked storage buckets for a project. (buckets.listProjectsBuckets)
   *
   * @param string $parent Required. Resource name of the parent Firebase project,
   * `projects/{project_number}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of buckets to return. If not set,
   * the server will use a reasonable default.
   * @opt_param string pageToken A page token, received from a previous
   * `ListBuckets` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListBuckets` must match the
   * call that provided the page token.
   * @return ListBucketsResponse
   */
  public function listProjectsBuckets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBucketsResponse::class);
  }
  /**
   * Unlinks a linked Google Cloud Storage bucket from a Firebase project.
   * (buckets.removeFirebase)
   *
   * @param string $bucket Required. Resource name of the bucket, mirrors the ID
   * of the underlying Google Cloud Storage bucket,
   * `projects/{project_number}/buckets/{bucket_id}`.
   * @param RemoveFirebaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FirebasestorageEmpty
   */
  public function removeFirebase($bucket, RemoveFirebaseRequest $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeFirebase', [$params], FirebasestorageEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsBuckets::class, 'Google_Service_Firebasestorage_Resource_ProjectsBuckets');
