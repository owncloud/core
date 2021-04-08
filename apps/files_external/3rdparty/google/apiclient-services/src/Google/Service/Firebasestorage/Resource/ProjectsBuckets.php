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
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasestorageService = new Google_Service_Firebasestorage(...);
 *   $buckets = $firebasestorageService->buckets;
 *  </code>
 */
class Google_Service_Firebasestorage_Resource_ProjectsBuckets extends Google_Service_Resource
{
  /**
   * Links a Google Cloud Storage bucket to a Firebase project.
   * (buckets.addFirebase)
   *
   * @param string $bucket Required. Resource name of the bucket, mirrors the ID
   * of the underlying Google Cloud Storage bucket. Because bucket resource names
   * are unique across projects, you may omit the project number,
   * `projects/-/buckets/{bucket_id}`.
   * @param Google_Service_Firebasestorage_AddFirebaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebasestorage_Bucket
   */
  public function addFirebase($bucket, Google_Service_Firebasestorage_AddFirebaseRequest $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addFirebase', array($params), "Google_Service_Firebasestorage_Bucket");
  }
  /**
   * Gets a single linked storage bucket. (buckets.get)
   *
   * @param string $name Required. Resource name of the bucket, mirrors the ID of
   * the underlying Google Cloud Storage bucket. Because bucket resource names are
   * unique across projects, you may omit the project number,
   * `projects/-/buckets/{bucket_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebasestorage_Bucket
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firebasestorage_Bucket");
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
   * @return Google_Service_Firebasestorage_ListBucketsResponse
   */
  public function listProjectsBuckets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Firebasestorage_ListBucketsResponse");
  }
  /**
   * Unlinks a linked Google Cloud Storage bucket from a Firebase project.
   * (buckets.removeFirebase)
   *
   * @param string $bucket Required. Resource name of the bucket, mirrors the ID
   * of the underlying Google Cloud Storage bucket. Because bucket resource names
   * are unique across projects, you may omit the project number,
   * `projects/-/buckets/{bucket_id}`.
   * @param Google_Service_Firebasestorage_RemoveFirebaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebasestorage_FirebasestorageEmpty
   */
  public function removeFirebase($bucket, Google_Service_Firebasestorage_RemoveFirebaseRequest $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeFirebase', array($params), "Google_Service_Firebasestorage_FirebasestorageEmpty");
  }
}
