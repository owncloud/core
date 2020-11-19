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
 * The "manualTriggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $manualTriggers = $displayvideoService->manualTriggers;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_AdvertisersManualTriggers extends Google_Service_Resource
{
  /**
   * Activates a manual trigger. Each activation of the manual trigger must be at
   * least 5 minutes apart, otherwise an error will be returned.
   * (manualTriggers.activate)
   *
   * @param string $advertiserId Required. The ID of the advertiser that the
   * manual trigger belongs.
   * @param string $triggerId Required. The ID of the manual trigger to activate.
   * @param Google_Service_DisplayVideo_ActivateManualTriggerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_ManualTrigger
   */
  public function activate($advertiserId, $triggerId, Google_Service_DisplayVideo_ActivateManualTriggerRequest $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'triggerId' => $triggerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_DisplayVideo_ManualTrigger");
  }
  /**
   * Creates a new manual trigger. Returns the newly created manual trigger if
   * successful. (manualTriggers.create)
   *
   * @param string $advertiserId Required. Immutable. The unique ID of the
   * advertiser that the manual trigger belongs to.
   * @param Google_Service_DisplayVideo_ManualTrigger $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_ManualTrigger
   */
  public function create($advertiserId, Google_Service_DisplayVideo_ManualTrigger $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_ManualTrigger");
  }
  /**
   * Deactivates a manual trigger. (manualTriggers.deactivate)
   *
   * @param string $advertiserId Required. The ID of the advertiser that the
   * manual trigger belongs.
   * @param string $triggerId Required. The ID of the manual trigger to
   * deactivate.
   * @param Google_Service_DisplayVideo_DeactivateManualTriggerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_ManualTrigger
   */
  public function deactivate($advertiserId, $triggerId, Google_Service_DisplayVideo_DeactivateManualTriggerRequest $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'triggerId' => $triggerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deactivate', array($params), "Google_Service_DisplayVideo_ManualTrigger");
  }
  /**
   * Gets a manual trigger. (manualTriggers.get)
   *
   * @param string $advertiserId Required. The ID of the advertiser this manual
   * trigger belongs to.
   * @param string $triggerId Required. The ID of the manual trigger to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_ManualTrigger
   */
  public function get($advertiserId, $triggerId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'triggerId' => $triggerId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_ManualTrigger");
  }
  /**
   * Lists manual triggers that are accessible to the current user for a given
   * advertiser id. The order is defined by the order_by parameter. A single
   * advertiser_id is required. (manualTriggers.listAdvertisersManualTriggers)
   *
   * @param string $advertiserId Required. The ID of the advertiser that the
   * fetched manual triggers belong to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by manual trigger properties.
   * Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by `AND` or `OR` logical
   * operators. A sequence of restrictions implicitly uses `AND`. * A restriction
   * has the form of `{field} {operator} {value}`. * The operator must be `EQUALS
   * (=)`. * Supported fields: - `displayName` - `state` Examples: * All active
   * manual triggers under an advertiser: `state="ACTIVE"` The length of this
   * field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) * `state` The default sorting order is
   * ascending. To specify descending order for a field, a suffix "desc" should be
   * added to the field name. For example, `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListManualTriggers` method. If not specified, the first
   * page of results will be returned.
   * @return Google_Service_DisplayVideo_ListManualTriggersResponse
   */
  public function listAdvertisersManualTriggers($advertiserId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListManualTriggersResponse");
  }
  /**
   * Updates a manual trigger. Returns the updated manual trigger if successful.
   * (manualTriggers.patch)
   *
   * @param string $advertiserId Required. Immutable. The unique ID of the
   * advertiser that the manual trigger belongs to.
   * @param string $triggerId Output only. The unique ID of the manual trigger.
   * @param Google_Service_DisplayVideo_ManualTrigger $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Google_Service_DisplayVideo_ManualTrigger
   */
  public function patch($advertiserId, $triggerId, Google_Service_DisplayVideo_ManualTrigger $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'triggerId' => $triggerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DisplayVideo_ManualTrigger");
  }
}
