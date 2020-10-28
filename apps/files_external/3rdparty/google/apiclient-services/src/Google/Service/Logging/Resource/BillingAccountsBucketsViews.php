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
 * The "views" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $views = $loggingService->views;
 *  </code>
 */
class Google_Service_Logging_Resource_BillingAccountsBucketsViews extends Google_Service_Resource
{
  /**
   * Gets a view. (views.get)
   *
   * @param string $name Required. The resource name of the policy: "projects/[PRO
   * JECT_ID]/locations/[LOCATION_ID]/buckets/[BUCKET_ID]/views/[VIEW_ID]"
   * Example: "projects/my-project-id/locations/my-location/buckets/my-bucket-
   * id/views/my-view-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogView
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogView");
  }
}
