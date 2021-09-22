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

namespace Google\Service\Cloudchannel\Resource;

use Google\Service\Cloudchannel\GoogleCloudChannelV1ChannelPartnerLink;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListChannelPartnerLinksResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1UpdateChannelPartnerLinkRequest;

/**
 * The "channelPartnerLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $channelPartnerLinks = $cloudchannelService->channelPartnerLinks;
 *  </code>
 */
class AccountsChannelPartnerLinks extends \Google\Service\Resource
{
  /**
   * Initiates a channel partner link between a distributor and a reseller, or
   * between resellers in an n-tier reseller channel. Invited partners need to
   * follow the invite_link_uri provided in the response to accept. After
   * accepting the invitation, a link is set up between the two parties. You must
   * be a distributor to call this method. Possible error codes: *
   * PERMISSION_DENIED: The reseller account making the request is different from
   * the reseller account in the API request. * INVALID_ARGUMENT: Required request
   * parameters are missing or invalid. * ALREADY_EXISTS: The ChannelPartnerLink
   * sent in the request already exists. * NOT_FOUND: No Cloud Identity customer
   * exists for provided domain. * INTERNAL: Any non-user error related to a
   * technical issue in the backend. Contact Cloud Channel support. * UNKNOWN: Any
   * non-user error related to a technical issue in the backend. Contact Cloud
   * Channel support. Return value: The new ChannelPartnerLink resource.
   * (channelPartnerLinks.create)
   *
   * @param string $parent Required. Create a channel partner link for the
   * provided reseller account's resource name. Parent uses the format:
   * accounts/{account_id}
   * @param GoogleCloudChannelV1ChannelPartnerLink $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ChannelPartnerLink
   */
  public function create($parent, GoogleCloudChannelV1ChannelPartnerLink $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudChannelV1ChannelPartnerLink::class);
  }
  /**
   * Returns the requested ChannelPartnerLink resource. You must be a distributor
   * to call this method. Possible error codes: * PERMISSION_DENIED: The reseller
   * account making the request is different from the reseller account in the API
   * request. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. * NOT_FOUND: ChannelPartnerLink resource not found because of an
   * invalid channel partner link name. Return value: The ChannelPartnerLink
   * resource. (channelPartnerLinks.get)
   *
   * @param string $name Required. The resource name of the channel partner link
   * to retrieve. Name uses the format:
   * accounts/{account_id}/channelPartnerLinks/{id} where {id} is the Cloud
   * Identity ID of the partner.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. The level of granularity the
   * ChannelPartnerLink will display.
   * @return GoogleCloudChannelV1ChannelPartnerLink
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudChannelV1ChannelPartnerLink::class);
  }
  /**
   * List ChannelPartnerLinks belonging to a distributor. You must be a
   * distributor to call this method. Possible error codes: * PERMISSION_DENIED:
   * The reseller account making the request is different from the reseller
   * account in the API request. * INVALID_ARGUMENT: Required request parameters
   * are missing or invalid. Return value: The list of the distributor account's
   * ChannelPartnerLink resources.
   * (channelPartnerLinks.listAccountsChannelPartnerLinks)
   *
   * @param string $parent Required. The resource name of the reseller account for
   * listing channel partner links. Parent uses the format: accounts/{account_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, server will pick a default size
   * (25). The maximum value is 200; the server will coerce values above 200.
   * @opt_param string pageToken Optional. A token for a page of results other
   * than the first page. Obtained using
   * ListChannelPartnerLinksResponse.next_page_token of the previous
   * CloudChannelService.ListChannelPartnerLinks call.
   * @opt_param string view Optional. The level of granularity the
   * ChannelPartnerLink will display.
   * @return GoogleCloudChannelV1ListChannelPartnerLinksResponse
   */
  public function listAccountsChannelPartnerLinks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudChannelV1ListChannelPartnerLinksResponse::class);
  }
  /**
   * Updates a channel partner link. Distributors call this method to change a
   * link's status. For example, to suspend a partner link. You must be a
   * distributor to call this method. Possible error codes: * PERMISSION_DENIED:
   * The reseller account making the request is different from the reseller
   * account in the API request. * INVALID_ARGUMENT: * Required request parameters
   * are missing or invalid. * Link state cannot change from invited to active or
   * suspended. * Cannot send reseller_cloud_identity_id, invite_url, or name in
   * update mask. * NOT_FOUND: ChannelPartnerLink resource not found. * INTERNAL:
   * Any non-user error related to a technical issue in the backend. Contact Cloud
   * Channel support. * UNKNOWN: Any non-user error related to a technical issue
   * in the backend. Contact Cloud Channel support. Return value: The updated
   * ChannelPartnerLink resource. (channelPartnerLinks.patch)
   *
   * @param string $name Required. The resource name of the channel partner link
   * to cancel. Name uses the format:
   * accounts/{account_id}/channelPartnerLinks/{id} where {id} is the Cloud
   * Identity ID of the partner.
   * @param GoogleCloudChannelV1UpdateChannelPartnerLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ChannelPartnerLink
   */
  public function patch($name, GoogleCloudChannelV1UpdateChannelPartnerLinkRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudChannelV1ChannelPartnerLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsChannelPartnerLinks::class, 'Google_Service_Cloudchannel_Resource_AccountsChannelPartnerLinks');
