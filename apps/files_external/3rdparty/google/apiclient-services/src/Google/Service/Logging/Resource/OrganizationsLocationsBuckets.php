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
 *   $loggingService = new Google_Service_Logging(...);
 *   $buckets = $loggingService->buckets;
 *  </code>
 */
class Google_Service_Logging_Resource_OrganizationsLocationsBuckets extends Google_Service_Resource
{
  /**
   * Creates a bucket that can be used to store log entries. Once a bucket has
   * been created, the region cannot be changed. (buckets.create)
   *
   * @param string $parent Required. The resource in which to create the bucket:
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]" Example: "projects/my-
   * logging-project/locations/global"
   * @param Google_Service_Logging_LogBucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string bucketId Required. A client-assigned identifier such as
   * "my-bucket". Identifiers are limited to 100 characters and can include only
   * letters, digits, underscores, hyphens, and periods.
   * @return Google_Service_Logging_LogBucket
   */
  public function create($parent, Google_Service_Logging_LogBucket $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogBucket");
  }
  /**
   * Deletes a bucket. Moves the bucket to the DELETE_REQUESTED state. After 7
   * days, the bucket will be purged and all logs in the bucket will be
   * permanently deleted. (buckets.delete)
   *
   * @param string $name Required. The full resource name of the bucket to delete.
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * Example: "projects/my-project-id/locations/my-location/buckets/my-bucket-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LoggingEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_LoggingEmpty");
  }
  /**
   * Gets a bucket (Beta). (buckets.get)
   *
   * @param string $name Required. The resource name of the bucket:
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * Example: "projects/my-project-id/locations/my-location/buckets/my-bucket-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogBucket
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogBucket");
  }
  /**
   * Lists buckets (Beta). (buckets.listOrganizationsLocationsBuckets)
   *
   * @param string $parent Required. The parent resource whose buckets are to be
   * listed: "projects/[PROJECT_ID]/locations/[LOCATION_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]"
   * "folders/[FOLDER_ID]/locations/[LOCATION_ID]" Note: The locations portion of
   * the resource must be specified, but supplying the character - in place of
   * LOCATION_ID will return all buckets.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. pageToken must be
   * the value of nextPageToken from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * nextPageToken in the response indicates that more results might be available.
   * @return Google_Service_Logging_ListBucketsResponse
   */
  public function listOrganizationsLocationsBuckets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListBucketsResponse");
  }
  /**
   * Updates a bucket. This method replaces the following fields in the existing
   * bucket with values from the new bucket: retention_periodIf the retention
   * period is decreased and the bucket is locked, FAILED_PRECONDITION will be
   * returned.If the bucket has a LifecycleState of DELETE_REQUESTED,
   * FAILED_PRECONDITION will be returned.A buckets region may not be modified
   * after it is created. This method is in Beta. (buckets.patch)
   *
   * @param string $name Required. The full resource name of the bucket to update.
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * Example: "projects/my-project-id/locations/my-location/buckets/my-bucket-id".
   * Also requires permission "resourcemanager.projects.updateLiens" to set the
   * locked property
   * @param Google_Service_Logging_LogBucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Field mask that specifies the fields
   * in bucket that need an update. A bucket field will be overwritten if, and
   * only if, it is in the update mask. name and output only fields cannot be
   * updated.For a detailed FieldMask definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#google.protobuf.FieldMaskExample:
   * updateMask=retention_days.
   * @return Google_Service_Logging_LogBucket
   */
  public function patch($name, Google_Service_Logging_LogBucket $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Logging_LogBucket");
  }
  /**
   * Undeletes a bucket. A bucket that has been deleted may be undeleted within
   * the grace period of 7 days. (buckets.undelete)
   *
   * @param string $name Required. The full resource name of the bucket to
   * undelete. "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * Example: "projects/my-project-id/locations/my-location/buckets/my-bucket-id".
   * @param Google_Service_Logging_UndeleteBucketRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LoggingEmpty
   */
  public function undelete($name, Google_Service_Logging_UndeleteBucketRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Logging_LoggingEmpty");
  }
}
