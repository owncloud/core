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

class Google_Service_Cloudchannel_GoogleCloudChannelV1SubscriberEvent extends Google_Model
{
  protected $customerEventType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1CustomerEvent';
  protected $customerEventDataType = '';
  protected $entitlementEventType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1EntitlementEvent';
  protected $entitlementEventDataType = '';

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1CustomerEvent
   */
  public function setCustomerEvent(Google_Service_Cloudchannel_GoogleCloudChannelV1CustomerEvent $customerEvent)
  {
    $this->customerEvent = $customerEvent;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1CustomerEvent
   */
  public function getCustomerEvent()
  {
    return $this->customerEvent;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1EntitlementEvent
   */
  public function setEntitlementEvent(Google_Service_Cloudchannel_GoogleCloudChannelV1EntitlementEvent $entitlementEvent)
  {
    $this->entitlementEvent = $entitlementEvent;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1EntitlementEvent
   */
  public function getEntitlementEvent()
  {
    return $this->entitlementEvent;
  }
}
