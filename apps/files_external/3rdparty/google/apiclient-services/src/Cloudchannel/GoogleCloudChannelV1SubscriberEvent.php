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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1SubscriberEvent extends \Google\Model
{
  protected $customerEventType = GoogleCloudChannelV1CustomerEvent::class;
  protected $customerEventDataType = '';
  protected $entitlementEventType = GoogleCloudChannelV1EntitlementEvent::class;
  protected $entitlementEventDataType = '';

  /**
   * @param GoogleCloudChannelV1CustomerEvent
   */
  public function setCustomerEvent(GoogleCloudChannelV1CustomerEvent $customerEvent)
  {
    $this->customerEvent = $customerEvent;
  }
  /**
   * @return GoogleCloudChannelV1CustomerEvent
   */
  public function getCustomerEvent()
  {
    return $this->customerEvent;
  }
  /**
   * @param GoogleCloudChannelV1EntitlementEvent
   */
  public function setEntitlementEvent(GoogleCloudChannelV1EntitlementEvent $entitlementEvent)
  {
    $this->entitlementEvent = $entitlementEvent;
  }
  /**
   * @return GoogleCloudChannelV1EntitlementEvent
   */
  public function getEntitlementEvent()
  {
    return $this->entitlementEvent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1SubscriberEvent::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1SubscriberEvent');
