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
 * The "notificationChannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $notificationChannels = $monitoringService->notificationChannels;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ProjectsNotificationChannels extends Google_Service_Resource
{
  /**
   * Creates a new notification channel, representing a single notification
   * endpoint such as an email address, SMS number, or PagerDuty service.
   * (notificationChannels.create)
   *
   * @param string $name Required. The project on which to execute the request.
   * The format is: projects/[PROJECT_ID_OR_NUMBER] This names the container into
   * which the channel will be written, this does not name the newly created
   * channel. The resulting channel's name will have a normalized version of this
   * field as a prefix, but will add /notificationChannels/[CHANNEL_ID] to
   * identify the channel.
   * @param Google_Service_Monitoring_NotificationChannel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_NotificationChannel
   */
  public function create($name, Google_Service_Monitoring_NotificationChannel $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_NotificationChannel");
  }
  /**
   * Deletes a notification channel. (notificationChannels.delete)
   *
   * @param string $name Required. The channel for which to execute the request.
   * The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/notificationChannels/[CHANNEL_ID]
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force If true, the notification channel will be deleted
   * regardless of its use in alert policies (the policies will be updated to
   * remove the channel). If false, channels that are still referenced by an
   * existing alerting policy will fail to be deleted in a delete operation.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Gets a single notification channel. The channel includes the relevant
   * configuration details with which the channel was created. However, the
   * response may truncate or omit passwords, API keys, or other private key
   * matter and thus the response may not be 100% identical to the information
   * that was supplied in the call to the create method.
   * (notificationChannels.get)
   *
   * @param string $name Required. The channel for which to execute the request.
   * The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/notificationChannels/[CHANNEL_ID]
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_NotificationChannel
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_NotificationChannel");
  }
  /**
   * Requests a verification code for an already verified channel that can then be
   * used in a call to VerifyNotificationChannel() on a different channel with an
   * equivalent identity in the same or in a different project. This makes it
   * possible to copy a channel between projects without requiring manual
   * reverification of the channel. If the channel is not in the verified state,
   * this method will fail (in other words, this may only be used if the
   * SendNotificationChannelVerificationCode and VerifyNotificationChannel paths
   * have already been used to put the given channel into the verified
   * state).There is no guarantee that the verification codes returned by this
   * method will be of a similar structure or form as the ones that are delivered
   * to the channel via SendNotificationChannelVerificationCode; while
   * VerifyNotificationChannel() will recognize both the codes delivered via
   * SendNotificationChannelVerificationCode() and returned from
   * GetNotificationChannelVerificationCode(), it is typically the case that the
   * verification codes delivered via SendNotificationChannelVerificationCode()
   * will be shorter and also have a shorter expiration (e.g. codes such as
   * "G-123456") whereas GetVerificationCode() will typically return a much
   * longer, websafe base 64 encoded string that has a longer expiration time.
   * (notificationChannels.getVerificationCode)
   *
   * @param string $name Required. The notification channel for which a
   * verification code is to be generated and retrieved. This must name a channel
   * that is already verified; if the specified channel is not verified, the
   * request will fail.
   * @param Google_Service_Monitoring_GetNotificationChannelVerificationCodeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_GetNotificationChannelVerificationCodeResponse
   */
  public function getVerificationCode($name, Google_Service_Monitoring_GetNotificationChannelVerificationCodeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getVerificationCode', array($params), "Google_Service_Monitoring_GetNotificationChannelVerificationCodeResponse");
  }
  /**
   * Lists the notification channels that have been created for the project.
   * (notificationChannels.listProjectsNotificationChannels)
   *
   * @param string $name Required. The project on which to execute the request.
   * The format is: projects/[PROJECT_ID_OR_NUMBER] This names the container in
   * which to look for the notification channels; it does not name a specific
   * channel. To query a specific channel by REST resource name, use the
   * GetNotificationChannel operation.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If provided, this field specifies the criteria that
   * must be met by notification channels to be included in the response.For more
   * details, see sorting and filtering
   * (https://cloud.google.com/monitoring/api/v3/sorting-and-filtering).
   * @opt_param string pageToken If non-empty, page_token must contain a value
   * returned as the next_page_token in a previous response to request the next
   * set of results.
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. If not set to a positive number, a reasonable value will be chosen
   * by the service.
   * @opt_param string orderBy A comma-separated list of fields by which to sort
   * the result. Supports the same set of fields as in filter. Entries can be
   * prefixed with a minus sign to sort in descending rather than ascending
   * order.For more details, see sorting and filtering
   * (https://cloud.google.com/monitoring/api/v3/sorting-and-filtering).
   * @return Google_Service_Monitoring_ListNotificationChannelsResponse
   */
  public function listProjectsNotificationChannels($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListNotificationChannelsResponse");
  }
  /**
   * Updates a notification channel. Fields not specified in the field mask remain
   * unchanged. (notificationChannels.patch)
   *
   * @param string $name The full REST resource name for this channel. The format
   * is: projects/[PROJECT_ID_OR_NUMBER]/notificationChannels/[CHANNEL_ID] The
   * [CHANNEL_ID] is automatically assigned by the server on creation.
   * @param Google_Service_Monitoring_NotificationChannel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update.
   * @return Google_Service_Monitoring_NotificationChannel
   */
  public function patch($name, Google_Service_Monitoring_NotificationChannel $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Monitoring_NotificationChannel");
  }
  /**
   * Causes a verification code to be delivered to the channel. The code can then
   * be supplied in VerifyNotificationChannel to verify the channel.
   * (notificationChannels.sendVerificationCode)
   *
   * @param string $name Required. The notification channel to which to send a
   * verification code.
   * @param Google_Service_Monitoring_SendNotificationChannelVerificationCodeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function sendVerificationCode($name, Google_Service_Monitoring_SendNotificationChannelVerificationCodeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('sendVerificationCode', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Verifies a NotificationChannel by proving receipt of the code delivered to
   * the channel as a result of calling SendNotificationChannelVerificationCode.
   * (notificationChannels.verify)
   *
   * @param string $name Required. The notification channel to verify.
   * @param Google_Service_Monitoring_VerifyNotificationChannelRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_NotificationChannel
   */
  public function verify($name, Google_Service_Monitoring_VerifyNotificationChannelRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verify', array($params), "Google_Service_Monitoring_NotificationChannel");
  }
}
