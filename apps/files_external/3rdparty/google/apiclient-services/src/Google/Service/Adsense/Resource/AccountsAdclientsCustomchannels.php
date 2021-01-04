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
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_Adsense(...);
 *   $customchannels = $adsenseService->customchannels;
 *  </code>
 */
class Google_Service_Adsense_Resource_AccountsAdclientsCustomchannels extends Google_Service_Resource
{
  /**
   * Gets information about the selected custom channel. (customchannels.get)
   *
   * @param string $name Required. Name of the custom channel. Format:
   * accounts/{account}/adclients/{adclient}/customchannels/{customchannel}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Adsense_CustomChannel
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Adsense_CustomChannel");
  }
  /**
   * Lists all the custom channels available in an ad client.
   * (customchannels.listAccountsAdclientsCustomchannels)
   *
   * @param string $parent Required. The ad client which owns the collection of
   * custom channels. Format: accounts/{account}/adclients/{adclient}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of custom channels to include in
   * the response, used for paging. If unspecified, at most 10000 custom channels
   * will be returned. The maximum value is 10000; values above 10000 will be
   * coerced to 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListCustomChannels` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListCustomChannels` must match
   * the call that provided the page token.
   * @return Google_Service_Adsense_ListCustomChannelsResponse
   */
  public function listAccountsAdclientsCustomchannels($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Adsense_ListCustomChannelsResponse");
  }
  /**
   * Lists all the ad units available for a custom channel.
   * (customchannels.listLinkedAdUnits)
   *
   * @param string $parent Required. The custom channel which owns the collection
   * of ad units. Format:
   * accounts/{account}/adclients/{adclient}/customchannels/{customchannel}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of ad units to include in the
   * response, used for paging. If unspecified, at most 10000 ad units will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListLinkedAdUnits` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListLinkedAdUnits` must match
   * the call that provided the page token.
   * @return Google_Service_Adsense_ListLinkedAdUnitsResponse
   */
  public function listLinkedAdUnits($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('listLinkedAdUnits', array($params), "Google_Service_Adsense_ListLinkedAdUnitsResponse");
  }
}
