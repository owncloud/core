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

namespace Google\Service\GoogleAnalyticsAdmin\Resource;

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaCancelDisplayVideo360AdvertiserLinkProposalRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinkProposalsResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "displayVideo360AdvertiserLinkProposals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $displayVideo360AdvertiserLinkProposals = $analyticsadminService->displayVideo360AdvertiserLinkProposals;
 *  </code>
 */
class PropertiesDisplayVideo360AdvertiserLinkProposals extends \Google\Service\Resource
{
  /**
   * Approves a DisplayVideo360AdvertiserLinkProposal. The
   * DisplayVideo360AdvertiserLinkProposal will be deleted and a new
   * DisplayVideo360AdvertiserLink will be created.
   * (displayVideo360AdvertiserLinkProposals.approve)
   *
   * @param string $name Required. The name of the
   * DisplayVideo360AdvertiserLinkProposal to approve. Example format:
   * properties/1234/displayVideo360AdvertiserLinkProposals/5678
   * @param GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalResponse
   */
  public function approve($name, GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('approve', [$params], GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalResponse::class);
  }
  /**
   * Cancels a DisplayVideo360AdvertiserLinkProposal. Cancelling can mean either:
   * - Declining a proposal initiated from Display & Video 360 - Withdrawing a
   * proposal initiated from Google Analytics After being cancelled, a proposal
   * will eventually be deleted automatically.
   * (displayVideo360AdvertiserLinkProposals.cancel)
   *
   * @param string $name Required. The name of the
   * DisplayVideo360AdvertiserLinkProposal to cancel. Example format:
   * properties/1234/displayVideo360AdvertiserLinkProposals/5678
   * @param GoogleAnalyticsAdminV1alphaCancelDisplayVideo360AdvertiserLinkProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal
   */
  public function cancel($name, GoogleAnalyticsAdminV1alphaCancelDisplayVideo360AdvertiserLinkProposalRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal::class);
  }
  /**
   * Creates a DisplayVideo360AdvertiserLinkProposal.
   * (displayVideo360AdvertiserLinkProposals.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal::class);
  }
  /**
   * Deletes a DisplayVideo360AdvertiserLinkProposal on a property. This can only
   * be used on cancelled proposals.
   * (displayVideo360AdvertiserLinkProposals.delete)
   *
   * @param string $name Required. The name of the
   * DisplayVideo360AdvertiserLinkProposal to delete. Example format:
   * properties/1234/displayVideo360AdvertiserLinkProposals/5678
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Lookup for a single DisplayVideo360AdvertiserLinkProposal.
   * (displayVideo360AdvertiserLinkProposals.get)
   *
   * @param string $name Required. The name of the
   * DisplayVideo360AdvertiserLinkProposal to get. Example format:
   * properties/1234/displayVideo360AdvertiserLinkProposals/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal::class);
  }
  /**
   * Lists DisplayVideo360AdvertiserLinkProposals on a property. (displayVideo360A
   * dvertiserLinkProposals.listPropertiesDisplayVideo360AdvertiserLinkProposals)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListDisplayVideo360AdvertiserLinkProposals` call. Provide this to retrieve
   * the subsequent page. When paginating, all other parameters provided to
   * `ListDisplayVideo360AdvertiserLinkProposals` must match the call that
   * provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinkProposalsResponse
   */
  public function listPropertiesDisplayVideo360AdvertiserLinkProposals($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinkProposalsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesDisplayVideo360AdvertiserLinkProposals::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesDisplayVideo360AdvertiserLinkProposals');
