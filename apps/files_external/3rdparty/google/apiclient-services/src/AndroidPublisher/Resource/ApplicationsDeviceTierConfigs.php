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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\DeviceTierConfig;
use Google\Service\AndroidPublisher\ListDeviceTierConfigsResponse;

/**
 * The "deviceTierConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $deviceTierConfigs = $androidpublisherService->deviceTierConfigs;
 *  </code>
 */
class ApplicationsDeviceTierConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new device tier config for an app. (deviceTierConfigs.create)
   *
   * @param string $packageName Package name of the app.
   * @param DeviceTierConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowUnknownDevices Whether the service should accept device
   * IDs that are unknown to Play's device catalog.
   * @return DeviceTierConfig
   */
  public function create($packageName, DeviceTierConfig $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], DeviceTierConfig::class);
  }
  /**
   * Returns a particular device tier config. (deviceTierConfigs.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $deviceTierConfigId Required. Id of an existing device tier
   * config.
   * @param array $optParams Optional parameters.
   * @return DeviceTierConfig
   */
  public function get($packageName, $deviceTierConfigId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'deviceTierConfigId' => $deviceTierConfigId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DeviceTierConfig::class);
  }
  /**
   * Returns created device tier configs, ordered by descending creation time.
   * (deviceTierConfigs.listApplicationsDeviceTierConfigs)
   *
   * @param string $packageName Package name of the app.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of device tier configs to return.
   * The service may return fewer than this value. If unspecified, at most 10
   * device tier configs will be returned. The maximum value for this field is
   * 100; values above 100 will be coerced to 100. Device tier configs will be
   * ordered by descending creation time.
   * @opt_param string pageToken A page token, received from a previous
   * `ListDeviceTierConfigs` call. Provide this to retrieve the subsequent page.
   * @return ListDeviceTierConfigsResponse
   */
  public function listApplicationsDeviceTierConfigs($packageName, $optParams = [])
  {
    $params = ['packageName' => $packageName];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDeviceTierConfigsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApplicationsDeviceTierConfigs::class, 'Google_Service_AndroidPublisher_Resource_ApplicationsDeviceTierConfigs');
