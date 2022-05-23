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

use Google\Service\Cloudchannel\GoogleCloudChannelV1ChannelPartnerRepricingConfig;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListChannelPartnerRepricingConfigsResponse;
use Google\Service\Cloudchannel\GoogleProtobufEmpty;

/**
 * The "channelPartnerRepricingConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $channelPartnerRepricingConfigs = $cloudchannelService->channelPartnerRepricingConfigs;
 *  </code>
 */
class AccountsChannelPartnerLinksChannelPartnerRepricingConfigs extends \Google\Service\Resource
{
  /**
   * Creates a ChannelPartnerRepricingConfig. Call this method to set
   * modifications for a specific ChannelPartner's bill. You can only create
   * configs if the RepricingConfig.effective_invoice_month is a future month. If
   * needed, you can create a config for the current month, with some
   * restrictions. When creating a config for a future month, make sure there are
   * no existing configs for that RepricingConfig.effective_invoice_month. The
   * following restrictions are for creating configs in the current month. * This
   * functionality is reserved for recovering from an erroneous config, and should
   * not be used for regular business cases. * The new config will not modify
   * exports used with other configs. Changes to the config may be immediate, but
   * may take up to 24 hours. * There is a limit of ten configs for any
   * ChannelPartner or RepricingConfig.effective_invoice_month. * The contained
   * ChannelPartnerRepricingConfig.repricing_config vaule must be different from
   * the value used in the current config for a ChannelPartner. Possible Error
   * Codes: * PERMISSION_DENIED: If the account making the request and the account
   * being queried are different. * INVALID_ARGUMENT: Missing or invalid required
   * parameters in the request. Also displays if the updated config is for the
   * current month or past months. * NOT_FOUND: The ChannelPartnerRepricingConfig
   * specified does not exist or is not associated with the given account. *
   * INTERNAL: Any non-user error related to technical issues in the backend. In
   * this case, contact Cloud Channel support. Return Value: If successful, the
   * updated ChannelPartnerRepricingConfig resource, otherwise returns an error.
   * (channelPartnerRepricingConfigs.create)
   *
   * @param string $parent Required. The resource name of the ChannelPartner that
   * will receive the repricing config. Parent uses the format:
   * accounts/{account_id}/channelPartnerLinks/{channel_partner_id}
   * @param GoogleCloudChannelV1ChannelPartnerRepricingConfig $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ChannelPartnerRepricingConfig
   */
  public function create($parent, GoogleCloudChannelV1ChannelPartnerRepricingConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudChannelV1ChannelPartnerRepricingConfig::class);
  }
  /**
   * Deletes the given ChannelPartnerRepricingConfig permanently. You can only
   * delete configs if their RepricingConfig.effective_invoice_month is set to a
   * date after the current month. Possible error codes: * PERMISSION_DENIED: The
   * account making the request does not own this customer. * INVALID_ARGUMENT:
   * Required request parameters are missing or invalid. * FAILED_PRECONDITION:
   * The ChannelPartnerRepricingConfig is active or in the past. * NOT_FOUND: No
   * ChannelPartnerRepricingConfig found for the name in the request.
   * (channelPartnerRepricingConfigs.delete)
   *
   * @param string $name Required. The resource name of the channel partner
   * repricing config rule to delete.
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
   * Gets information about how a Distributor modifies their bill before sending
   * it to a ChannelPartner. Possible Error Codes: * PERMISSION_DENIED: If the
   * account making the request and the account being queried are different. *
   * NOT_FOUND: The ChannelPartnerRepricingConfig was not found. * INTERNAL: Any
   * non-user error related to technical issues in the backend. In this case,
   * contact Cloud Channel support. Return Value: If successful, the
   * ChannelPartnerRepricingConfig resource, otherwise returns an error.
   * (channelPartnerRepricingConfigs.get)
   *
   * @param string $name Required. The resource name of the
   * ChannelPartnerRepricingConfig Format: accounts/{account_id}/channelPartnerLin
   * ks/{channel_partner_id}/channelPartnerRepricingConfigs/{id}.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ChannelPartnerRepricingConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudChannelV1ChannelPartnerRepricingConfig::class);
  }
  /**
   * Lists information about how a Reseller modifies their bill before sending it
   * to a ChannelPartner. Possible Error Codes: * PERMISSION_DENIED: If the
   * account making the request and the account being queried are different. *
   * NOT_FOUND: The ChannelPartnerRepricingConfig specified does not exist or is
   * not associated with the given account. * INTERNAL: Any non-user error related
   * to technical issues in the backend. In this case, contact Cloud Channel
   * support. Return Value: If successful, the ChannelPartnerRepricingConfig
   * resources. The data for each resource is displayed in the ascending order of:
   * * channel partner ID * RepricingConfig.effective_invoice_month *
   * ChannelPartnerRepricingConfig.update_time If unsuccessful, returns an error.
   * (channelPartnerRepricingConfigs.listAccountsChannelPartnerLinksChannelPartner
   * RepricingConfigs)
   *
   * @param string $parent Required. The resource name of the account's
   * ChannelPartnerLink. Parent uses the format:
   * accounts/{account_id}/channelPartnerLinks/{channel_partner_id}. Supports
   * accounts/{account_id}/channelPartnerLinks/- to retrieve configs for all
   * channel partners.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter for
   * [CloudChannelService.ListChannelPartnerRepricingConfigs] results
   * (channel_partner_link only). You can use this filter when you support a
   * BatchGet-like query. To use the filter, you must set
   * `parent=accounts/{account_id}/channelPartnerLinks/-`. Example:
   * `channel_partner_link = accounts/account_id/channelPartnerLinks/c1` OR
   * `channel_partner_link = accounts/account_id/channelPartnerLinks/c2`.
   * @opt_param int pageSize Optional. The maximum number of repricing configs to
   * return. The service may return fewer than this value. If unspecified, returns
   * a maximum of 50 rules. The maximum value is 100; values above 100 will be
   * coerced to 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * beyond the first page. Obtained through
   * ListChannelPartnerRepricingConfigsResponse.next_page_token of the previous
   * CloudChannelService.ListChannelPartnerRepricingConfigs call.
   * @return GoogleCloudChannelV1ListChannelPartnerRepricingConfigsResponse
   */
  public function listAccountsChannelPartnerLinksChannelPartnerRepricingConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudChannelV1ListChannelPartnerRepricingConfigsResponse::class);
  }
  /**
   * Updates a ChannelPartnerRepricingConfig. Call this method to set
   * modifications for a specific ChannelPartner's bill. This method overwrites
   * the existing CustomerRepricingConfig. You can only update configs if the
   * RepricingConfig.effective_invoice_month is a future month. To make changes to
   * configs for the current month, use CreateChannelPartnerRepricingConfig,
   * taking note of its restrictions. You cannot update the
   * RepricingConfig.effective_invoice_month. When updating a config in the
   * future: * This config must already exist. Possible Error Codes: *
   * PERMISSION_DENIED: If the account making the request and the account being
   * queried are different. * INVALID_ARGUMENT: Missing or invalid required
   * parameters in the request. Also displays if the updated config is for the
   * current month or past months. * NOT_FOUND: The ChannelPartnerRepricingConfig
   * specified does not exist or is not associated with the given account. *
   * INTERNAL: Any non-user error related to technical issues in the backend. In
   * this case, contact Cloud Channel support. Return Value: If successful, the
   * updated ChannelPartnerRepricingConfig resource, otherwise returns an error.
   * (channelPartnerRepricingConfigs.patch)
   *
   * @param string $name Output only. Resource name of the
   * ChannelPartnerRepricingConfig. Format: accounts/{account_id}/channelPartnerLi
   * nks/{channel_partner_id}/channelPartnerRepricingConfigs/{id}.
   * @param GoogleCloudChannelV1ChannelPartnerRepricingConfig $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ChannelPartnerRepricingConfig
   */
  public function patch($name, GoogleCloudChannelV1ChannelPartnerRepricingConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudChannelV1ChannelPartnerRepricingConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsChannelPartnerLinksChannelPartnerRepricingConfigs::class, 'Google_Service_Cloudchannel_Resource_AccountsChannelPartnerLinksChannelPartnerRepricingConfigs');
