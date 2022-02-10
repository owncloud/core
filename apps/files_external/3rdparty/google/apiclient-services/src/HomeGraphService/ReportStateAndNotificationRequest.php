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

namespace Google\Service\HomeGraphService;

class ReportStateAndNotificationRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $agentUserId;
  /**
   * @var string
   */
  public $eventId;
  /**
   * @var string
   */
  public $followUpToken;
  protected $payloadType = StateAndNotificationPayload::class;
  protected $payloadDataType = '';
  /**
   * @var string
   */
  public $requestId;

  /**
   * @param string
   */
  public function setAgentUserId($agentUserId)
  {
    $this->agentUserId = $agentUserId;
  }
  /**
   * @return string
   */
  public function getAgentUserId()
  {
    return $this->agentUserId;
  }
  /**
   * @param string
   */
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return string
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param string
   */
  public function setFollowUpToken($followUpToken)
  {
    $this->followUpToken = $followUpToken;
  }
  /**
   * @return string
   */
  public function getFollowUpToken()
  {
    return $this->followUpToken;
  }
  /**
   * @param StateAndNotificationPayload
   */
  public function setPayload(StateAndNotificationPayload $payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return StateAndNotificationPayload
   */
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportStateAndNotificationRequest::class, 'Google_Service_HomeGraphService_ReportStateAndNotificationRequest');
