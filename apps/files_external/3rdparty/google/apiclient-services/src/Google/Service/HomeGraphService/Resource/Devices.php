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
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $homegraphService = new Google_Service_HomeGraphService(...);
 *   $devices = $homegraphService->devices;
 *  </code>
 */
class Google_Service_HomeGraphService_Resource_Devices extends Google_Service_Resource
{
  /**
   * Gets the current states in Home Graph for the given set of the third-party
   * user's devices. The third-party user's identity is passed in via the
   * `agent_user_id` (see QueryRequest). This request must be authorized using
   * service account credentials from your Actions console project.
   * (devices.query)
   *
   * @param Google_Service_HomeGraphService_QueryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_HomeGraphService_QueryResponse
   */
  public function query(Google_Service_HomeGraphService_QueryRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('query', array($params), "Google_Service_HomeGraphService_QueryResponse");
  }
  /**
   * Reports device state and optionally sends device notifications. Called by
   * your smart home Action when the state of a third-party device changes or you
   * need to send a notification about the device. See [Implement Report
   * State](https://developers.google.com/assistant/smarthome/develop/report-
   * state) for more information. This method updates the device state according
   * to its declared
   * [traits](https://developers.google.com/assistant/smarthome/concepts/devices-
   * traits). Publishing a new state value outside of these traits will result in
   * an `INVALID_ARGUMENT` error response. The third-party user's identity is
   * passed in via the `agent_user_id` (see ReportStateAndNotificationRequest).
   * This request must be authorized using service account credentials from your
   * Actions console project. (devices.reportStateAndNotification)
   *
   * @param Google_Service_HomeGraphService_ReportStateAndNotificationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_HomeGraphService_ReportStateAndNotificationResponse
   */
  public function reportStateAndNotification(Google_Service_HomeGraphService_ReportStateAndNotificationRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reportStateAndNotification', array($params), "Google_Service_HomeGraphService_ReportStateAndNotificationResponse");
  }
  /**
   * Sends an account linking suggestion to users associated with any potential
   * Cast devices detected by third-party devices. This request must be authorized
   * using service account credentials from your Actions console project.
   * (devices.requestLink)
   *
   * @param Google_Service_HomeGraphService_RequestLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_HomeGraphService_HomegraphEmpty
   */
  public function requestLink(Google_Service_HomeGraphService_RequestLinkRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('requestLink', array($params), "Google_Service_HomeGraphService_HomegraphEmpty");
  }
  /**
   * Requests Google to send an `action.devices.SYNC` [intent](https://developers.
   * google.com/assistant/smarthome/reference/intent/sync) to your smart home
   * Action to update device metadata for the given user. The third-party user's
   * identity is passed via the `agent_user_id` (see RequestSyncDevicesRequest).
   * This request must be authorized using service account credentials from your
   * Actions console project. (devices.requestSync)
   *
   * @param Google_Service_HomeGraphService_RequestSyncDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_HomeGraphService_RequestSyncDevicesResponse
   */
  public function requestSync(Google_Service_HomeGraphService_RequestSyncDevicesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('requestSync', array($params), "Google_Service_HomeGraphService_RequestSyncDevicesResponse");
  }
  /**
   * Gets all the devices associated with the given third-party user. The third-
   * party user's identity is passed in via the `agent_user_id` (see SyncRequest).
   * This request must be authorized using service account credentials from your
   * Actions console project. (devices.sync)
   *
   * @param Google_Service_HomeGraphService_SyncRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_HomeGraphService_SyncResponse
   */
  public function sync(Google_Service_HomeGraphService_SyncRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('sync', array($params), "Google_Service_HomeGraphService_SyncResponse");
  }
}
