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

namespace Google\Service\RealTimeBidding\Resource;

use Google\Service\RealTimeBidding\ActivatePretargetingConfigRequest;
use Google\Service\RealTimeBidding\AddTargetedAppsRequest;
use Google\Service\RealTimeBidding\AddTargetedPublishersRequest;
use Google\Service\RealTimeBidding\AddTargetedSitesRequest;
use Google\Service\RealTimeBidding\ListPretargetingConfigsResponse;
use Google\Service\RealTimeBidding\PretargetingConfig;
use Google\Service\RealTimeBidding\RealtimebiddingEmpty;
use Google\Service\RealTimeBidding\RemoveTargetedAppsRequest;
use Google\Service\RealTimeBidding\RemoveTargetedPublishersRequest;
use Google\Service\RealTimeBidding\RemoveTargetedSitesRequest;
use Google\Service\RealTimeBidding\SuspendPretargetingConfigRequest;

/**
 * The "pretargetingConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google\Service\RealTimeBidding(...);
 *   $pretargetingConfigs = $realtimebiddingService->pretargetingConfigs;
 *  </code>
 */
class BiddersPretargetingConfigs extends \Google\Service\Resource
{
  /**
   * Activates a pretargeting configuration. (pretargetingConfigs.activate)
   *
   * @param string $name Required. The name of the pretargeting configuration.
   * Format: bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param ActivatePretargetingConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function activate($name, ActivatePretargetingConfigRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], PretargetingConfig::class);
  }
  /**
   * Adds targeted apps to the pretargeting configuration.
   * (pretargetingConfigs.addTargetedApps)
   *
   * @param string $pretargetingConfig Required. The name of the pretargeting
   * configuration. Format:
   * bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param AddTargetedAppsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function addTargetedApps($pretargetingConfig, AddTargetedAppsRequest $postBody, $optParams = [])
  {
    $params = ['pretargetingConfig' => $pretargetingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addTargetedApps', [$params], PretargetingConfig::class);
  }
  /**
   * Adds targeted publishers to the pretargeting config.
   * (pretargetingConfigs.addTargetedPublishers)
   *
   * @param string $pretargetingConfig Required. The name of the pretargeting
   * configuration. Format:
   * bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param AddTargetedPublishersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function addTargetedPublishers($pretargetingConfig, AddTargetedPublishersRequest $postBody, $optParams = [])
  {
    $params = ['pretargetingConfig' => $pretargetingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addTargetedPublishers', [$params], PretargetingConfig::class);
  }
  /**
   * Adds targeted sites to the pretargeting configuration.
   * (pretargetingConfigs.addTargetedSites)
   *
   * @param string $pretargetingConfig Required. The name of the pretargeting
   * configuration. Format:
   * bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param AddTargetedSitesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function addTargetedSites($pretargetingConfig, AddTargetedSitesRequest $postBody, $optParams = [])
  {
    $params = ['pretargetingConfig' => $pretargetingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addTargetedSites', [$params], PretargetingConfig::class);
  }
  /**
   * Creates a pretargeting configuration. A pretargeting configuration's state
   * (PretargetingConfig.state) is active upon creation, and it will start to
   * affect traffic shortly after. A bidder may create a maximum of 10
   * pretargeting configurations. Attempts to exceed this maximum results in a 400
   * bad request error. (pretargetingConfigs.create)
   *
   * @param string $parent Required. Name of the bidder to create the pretargeting
   * configuration for. Format: bidders/{bidderAccountId}
   * @param PretargetingConfig $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function create($parent, PretargetingConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], PretargetingConfig::class);
  }
  /**
   * Deletes a pretargeting configuration. (pretargetingConfigs.delete)
   *
   * @param string $name Required. The name of the pretargeting configuration to
   * delete. Format: bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param array $optParams Optional parameters.
   * @return RealtimebiddingEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], RealtimebiddingEmpty::class);
  }
  /**
   * Gets a pretargeting configuration. (pretargetingConfigs.get)
   *
   * @param string $name Required. Name of the pretargeting configuration to get.
   * Format: bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PretargetingConfig::class);
  }
  /**
   * Lists all pretargeting configurations for a single bidder.
   * (pretargetingConfigs.listBiddersPretargetingConfigs)
   *
   * @param string $parent Required. Name of the bidder whose pretargeting
   * configurations will be listed. Format: bidders/{bidderAccountId}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of pretargeting configurations to
   * return. If unspecified, at most 10 pretargeting configurations will be
   * returned. The maximum value is 100; values above 100 will be coerced to 100.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. This value is received from a previous
   * `ListPretargetingConfigs` call in
   * ListPretargetingConfigsResponse.nextPageToken.
   * @return ListPretargetingConfigsResponse
   */
  public function listBiddersPretargetingConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPretargetingConfigsResponse::class);
  }
  /**
   * Updates a pretargeting configuration. (pretargetingConfigs.patch)
   *
   * @param string $name Output only. Name of the pretargeting configuration that
   * must follow the pattern
   * `bidders/{bidder_account_id}/pretargetingConfigs/{config_id}`
   * @param PretargetingConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask to use for partial in-place updates.
   * @return PretargetingConfig
   */
  public function patch($name, PretargetingConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], PretargetingConfig::class);
  }
  /**
   * Removes targeted apps from the pretargeting configuration.
   * (pretargetingConfigs.removeTargetedApps)
   *
   * @param string $pretargetingConfig Required. The name of the pretargeting
   * configuration. Format:
   * bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param RemoveTargetedAppsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function removeTargetedApps($pretargetingConfig, RemoveTargetedAppsRequest $postBody, $optParams = [])
  {
    $params = ['pretargetingConfig' => $pretargetingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeTargetedApps', [$params], PretargetingConfig::class);
  }
  /**
   * Removes targeted publishers from the pretargeting config.
   * (pretargetingConfigs.removeTargetedPublishers)
   *
   * @param string $pretargetingConfig Required. The name of the pretargeting
   * configuration. Format:
   * bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param RemoveTargetedPublishersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function removeTargetedPublishers($pretargetingConfig, RemoveTargetedPublishersRequest $postBody, $optParams = [])
  {
    $params = ['pretargetingConfig' => $pretargetingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeTargetedPublishers', [$params], PretargetingConfig::class);
  }
  /**
   * Removes targeted sites from the pretargeting configuration.
   * (pretargetingConfigs.removeTargetedSites)
   *
   * @param string $pretargetingConfig Required. The name of the pretargeting
   * configuration. Format:
   * bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param RemoveTargetedSitesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function removeTargetedSites($pretargetingConfig, RemoveTargetedSitesRequest $postBody, $optParams = [])
  {
    $params = ['pretargetingConfig' => $pretargetingConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeTargetedSites', [$params], PretargetingConfig::class);
  }
  /**
   * Suspends a pretargeting configuration. (pretargetingConfigs.suspend)
   *
   * @param string $name Required. The name of the pretargeting configuration.
   * Format: bidders/{bidderAccountId}/pretargetingConfig/{configId}
   * @param SuspendPretargetingConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PretargetingConfig
   */
  public function suspend($name, SuspendPretargetingConfigRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('suspend', [$params], PretargetingConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiddersPretargetingConfigs::class, 'Google_Service_RealTimeBidding_Resource_BiddersPretargetingConfigs');
