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

use Google\Service\Logging\LogBucket;

/**
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google\Service\Logging(...);
 *   $buckets = $loggingService->buckets;
 *  </code>
 */
class BillingAccountsBuckets extends \Google\Service\Resource
{
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingAccountsBuckets::class, 'Google_Service_Logging_Resource_BillingAccountsBuckets');
