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

namespace Google\Service\Reseller\Resource;

use Google\Service\Reseller\ResellernotifyGetwatchdetailsResponse;
use Google\Service\Reseller\ResellernotifyResource;

/**
 * The "resellernotify" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google\Service\Reseller(...);
 *   $resellernotify = $resellerService->resellernotify;
 *  </code>
 */
class Resellernotify extends \Google\Service\Resource
{
  /**
   * Returns all the details of the watch corresponding to the reseller.
   * (resellernotify.getwatchdetails)
   *
   * @param array $optParams Optional parameters.
   * @return ResellernotifyGetwatchdetailsResponse
   */
  public function getwatchdetails($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getwatchdetails', [$params], ResellernotifyGetwatchdetailsResponse::class);
  }
  /**
   * Registers a Reseller for receiving notifications. (resellernotify.register)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceAccountEmailAddress The service account which will
   * own the created Cloud-PubSub topic.
   * @return ResellernotifyResource
   */
  public function register($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('register', [$params], ResellernotifyResource::class);
  }
  /**
   * Unregisters a Reseller for receiving notifications.
   * (resellernotify.unregister)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceAccountEmailAddress The service account which owns
   * the Cloud-PubSub topic.
   * @return ResellernotifyResource
   */
  public function unregister($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('unregister', [$params], ResellernotifyResource::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Resellernotify::class, 'Google_Service_Reseller_Resource_Resellernotify');
