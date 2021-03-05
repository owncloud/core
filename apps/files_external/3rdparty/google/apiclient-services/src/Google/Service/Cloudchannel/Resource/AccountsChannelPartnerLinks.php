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
 * The "channelPartnerLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google_Service_Cloudchannel(...);
 *   $channelPartnerLinks = $cloudchannelService->channelPartnerLinks;
 *  </code>
 */
class Google_Service_Cloudchannel_Resource_AccountsChannelPartnerLinks extends Google_Service_Resource
{
  /**
   * Initiates a channel partner link between a distributor and a reseller or
   * between resellers in an n-tier reseller channel. To accept the invite, the
   * invited partner should follow the invite_link_uri provided in the response.
   * If the link creation is accepted, a valid link is set up between the two
   * involved parties. To call this method, you must be a distributor. Possible
   * Error Codes: * PERMISSION_DENIED: If the reseller account making the request
   * and the reseller account being queried for are different. * INVALID_ARGUMENT:
   * Missing or invalid required parameters in the request. * ALREADY_EXISTS: If
   * the ChannelPartnerLink sent in the request already exists. * NOT_FOUND: If no
   * Cloud Identity customer exists for domain provided. * INTERNAL: Any non-user
   * error related to a technical issue in the backend. In this case, contact
   * Cloud Channel support. * UNKNOWN: Any non-user error related to a technical
   * issue in the backend. In this case, contact Cloud Channel support. Return
   * Value: Newly created ChannelPartnerLink resource if successful, otherwise
   * error is returned. (channelPartnerLinks.create)
   *
   * @param string $parent Required. The resource name of reseller's account for
   * which to create a channel partner link. The parent takes the format:
   * accounts/{account_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink
   */
  public function create($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink");
  }
  /**
   * Returns a requested ChannelPartnerLink resource. To call this method, you
   * must be a distributor. Possible Error Codes: * PERMISSION_DENIED: If the
   * reseller account making the request and the reseller account being queried
   * for are different. * INVALID_ARGUMENT: Missing or invalid required parameters
   * in the request. * NOT_FOUND: ChannelPartnerLink resource not found. Results
   * due invalid channel partner link name. Return Value: ChannelPartnerLink
   * resource if found, otherwise returns an error. (channelPartnerLinks.get)
   *
   * @param string $name Required. The resource name of the channel partner link
   * to retrieve. The name takes the format:
   * accounts/{account_id}/channelPartnerLinks/{id} where {id} is the Cloud
   * Identity ID of the partner.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. The level of granularity the
   * ChannelPartnerLink will display.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink");
  }
  /**
   * List ChannelPartnerLinks belonging to a distributor. To call this method, you
   * must be a distributor. Possible Error Codes: * PERMISSION_DENIED: If the
   * reseller account making the request and the reseller account being queried
   * for are different. * INVALID_ARGUMENT: Missing or invalid required parameters
   * in the request. Return Value: If successful, returns the list of
   * ChannelPartnerLink resources for the distributor account, otherwise returns
   * an error. (channelPartnerLinks.listAccountsChannelPartnerLinks)
   *
   * @param string $parent Required. The resource name of the reseller account for
   * listing channel partner links. The parent takes the format:
   * accounts/{account_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, server will pick a default size
   * (25). The maximum value is 200, values above 200 will be coerced to 200.
   * @opt_param string pageToken Optional. A token identifying a page of results,
   * if other than the first one. Typically obtained via
   * ListChannelPartnerLinksResponse.next_page_token of the previous
   * CloudChannelService.ListChannelPartnerLinks call.
   * @opt_param string view Optional. The level of granularity the
   * ChannelPartnerLink will display.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListChannelPartnerLinksResponse
   */
  public function listAccountsChannelPartnerLinks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListChannelPartnerLinksResponse");
  }
  /**
   * Updates a channel partner link. A distributor calls this method to change a
   * link's status. For example, suspend a partner link. To call this method, you
   * must be a distributor. Possible Error Codes: * PERMISSION_DENIED: If the
   * reseller account making the request and the reseller account being queried
   * for are different. * INVALID_ARGUMENT: It can happen in following scenarios -
   * * Missing or invalid required parameters in the request. * Updating link
   * state from invited to active or suspended. * Sending
   * reseller_cloud_identity_id, invite_url or name in update mask. * NOT_FOUND:
   * ChannelPartnerLink resource not found. * INTERNAL: Any non-user error related
   * to a technical issue in the backend. In this case, contact Cloud Channel
   * support. * UNKNOWN: Any non-user error related to a technical issue in the
   * backend. In this case, contact Cloud Channel support. Return Value: If
   * successful, the updated ChannelPartnerLink resource, otherwise returns an
   * error. (channelPartnerLinks.patch)
   *
   * @param string $name Required. The resource name of the channel partner link
   * to cancel. The name takes the format:
   * accounts/{account_id}/channelPartnerLinks/{id} where {id} is the Cloud
   * Identity ID of the partner.
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1UpdateChannelPartnerLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink
   */
  public function patch($name, Google_Service_Cloudchannel_GoogleCloudChannelV1UpdateChannelPartnerLinkRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink");
  }
}
