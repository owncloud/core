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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoNotification extends \Google\Model
{
  protected $buganizerNotificationType = EnterpriseCrmEventbusProtoBuganizerNotification::class;
  protected $buganizerNotificationDataType = '';
  protected $emailAddressType = EnterpriseCrmEventbusProtoAddress::class;
  protected $emailAddressDataType = '';
  /**
   * @var string
   */
  public $escalatorQueue;
  /**
   * @var string
   */
  public $pubsubTopic;
  protected $requestType = EnterpriseCrmEventbusProtoCustomSuspensionRequest::class;
  protected $requestDataType = '';

  /**
   * @param EnterpriseCrmEventbusProtoBuganizerNotification
   */
  public function setBuganizerNotification(EnterpriseCrmEventbusProtoBuganizerNotification $buganizerNotification)
  {
    $this->buganizerNotification = $buganizerNotification;
  }
  /**
   * @return EnterpriseCrmEventbusProtoBuganizerNotification
   */
  public function getBuganizerNotification()
  {
    return $this->buganizerNotification;
  }
  /**
   * @param EnterpriseCrmEventbusProtoAddress
   */
  public function setEmailAddress(EnterpriseCrmEventbusProtoAddress $emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  /**
   * @return EnterpriseCrmEventbusProtoAddress
   */
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  /**
   * @param string
   */
  public function setEscalatorQueue($escalatorQueue)
  {
    $this->escalatorQueue = $escalatorQueue;
  }
  /**
   * @return string
   */
  public function getEscalatorQueue()
  {
    return $this->escalatorQueue;
  }
  /**
   * @param string
   */
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  /**
   * @return string
   */
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  /**
   * @param EnterpriseCrmEventbusProtoCustomSuspensionRequest
   */
  public function setRequest(EnterpriseCrmEventbusProtoCustomSuspensionRequest $request)
  {
    $this->request = $request;
  }
  /**
   * @return EnterpriseCrmEventbusProtoCustomSuspensionRequest
   */
  public function getRequest()
  {
    return $this->request;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoNotification::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoNotification');
