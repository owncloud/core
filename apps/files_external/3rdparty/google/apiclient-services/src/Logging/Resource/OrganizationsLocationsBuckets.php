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

namespace Google\Service\Logging\Resource;

use Google\Service\Logging\ListBucketsResponse;
use Google\Service\Logging\LogBucket;
use Google\Service\Logging\LoggingEmpty;
use Google\Service\Logging\UndeleteBucketRequest;

/**
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google\Service\Logging(...);
 *   $buckets = $loggingService->buckets;
 *  </code>
 */
class OrganizationsLocationsBuckets extends \Google\Service\Resource
{
  /**
   * Creates a log bucket that can be used to store log entries. After a bucket
   * has been created, the bucket's location cannot be changed. (buckets.create)
   *
   * @param string $parent Required. The resource in which to create the log
   * bucket: "projects/[PROJECT_ID]/locations/[LOCATION_ID]" For example:"projects
   * /my-project/locations/global"
   * @param LogBucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string bucketId Required. A client-assigned identifier such as
   * "my-bucket". Identifiers are limited to 100 characters and can include only
   * letters, digits, underscores, hyphens, and periods.
   * @return LogBucket
   */
  public function create($parent, LogBucket $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], LogBucket::class);
  }
  /**
   * Deletes a log bucket.Changes the bucket's lifecycle_state to the
   * DELETE_REQUESTED state. After 7 days, the bucket will be purged and all log
   * entries in the bucket will be permanently deleted. (buckets.delete)
   *
   * @param string $name Required. The full resource name of the bucket to delete.
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]" For
   * example:"projects/my-project/locations/global/buckets/my-bucket"
   * @param array $optParams Optional parameters.
   * @return LoggingEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], LoggingEmpty::class);
  }
  /**
   * Gets a log bucket. (buckets.get)
   *
   * @param string $name Required. The resource name of the bucket:
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]" For
   * example:"projects/my-project/locations/global/buckets/my-bucket"
   * @param array $optParams Optional parameters.
   * @return LogBucket
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], LogBucket::class);
  }
  /**
   * Lists log buckets. (buckets.listOrganizationsLocationsBuckets)
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
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * nextPageToken in the response indicates that more results might be available.
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. pageToken must be
   * the value of nextPageToken from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @return ListBucketsResponse
   */
  public function listOrganizationsLocationsBuckets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBucketsResponse::class);
  }
  /**
   * Updates a log bucket. This method replaces the following fields in the
   * existing bucket with values from the new bucket: retention_periodIf the
   * retention period is decreased and the bucket is locked, FAILED_PRECONDITION
   * will be returned.If the bucket has a lifecycle_state of DELETE_REQUESTED,
   * then FAILED_PRECONDITION will be returned.After a bucket has been created,
   * the bucket's location cannot be changed. (buckets.patch)
   *
   * @param string $name Required. The full resource name of the bucket to update.
   * "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]" For
   * example:"projects/my-project/locations/global/buckets/my-bucket"
   * @param LogBucket $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Field mask that specifies the fields
   * in bucket that need an update. A bucket field will be overwritten if, and
   * only if, it is in the update mask. name and output only fields cannot be
   * updated.For a detailed FieldMask definition, see:
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#google.protobuf.FieldMaskFor example:
   * updateMask=retention_days
   * @return LogBucket
   */
  public function patch($name, LogBucket $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], LogBucket::class);
  }
  /**
   * Undeletes a log bucket. A bucket that has been deleted can be undeleted
   * within the grace period of 7 days. (buckets.undelete)
   *
   * @param string $name Required. The full resource name of the bucket to
   * undelete. "projects/[PROJECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "organizations/[ORGANIZATION_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET
   * _ID]" "folders/[FOLDER_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]" For
   * example:"projects/my-project/locations/global/buckets/my-bucket"
   * @param UndeleteBucketRequest $postBody
   * @param array $optParams Optional parameters.
   * @return LoggingEmpty
   */
  public function undelete($name, UndeleteBucketRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], LoggingEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsLocationsBuckets::class, 'Google_Service_Logging_Resource_OrganizationsLocationsBuckets');
