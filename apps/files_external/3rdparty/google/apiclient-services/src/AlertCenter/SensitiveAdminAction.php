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

namespace Google\Service\AlertCenter;

class SensitiveAdminAction extends \Google\Model
{
  /**
   * @var string
   */
  public $actorEmail;
  /**
   * @var string
   */
  public $eventTime;
  protected $primaryAdminChangedEventType = PrimaryAdminChangedEvent::class;
  protected $primaryAdminChangedEventDataType = '';
  protected $ssoProfileCreatedEventType = SSOProfileCreatedEvent::class;
  protected $ssoProfileCreatedEventDataType = '';
  protected $ssoProfileDeletedEventType = SSOProfileDeletedEvent::class;
  protected $ssoProfileDeletedEventDataType = '';
  protected $ssoProfileUpdatedEventType = SSOProfileUpdatedEvent::class;
  protected $ssoProfileUpdatedEventDataType = '';
  protected $superAdminPasswordResetEventType = SuperAdminPasswordResetEvent::class;
  protected $superAdminPasswordResetEventDataType = '';

  /**
   * @param string
   */
  public function setActorEmail($actorEmail)
  {
    $this->actorEmail = $actorEmail;
  }
  /**
   * @return string
   */
  public function getActorEmail()
  {
    return $this->actorEmail;
  }
  /**
   * @param string
   */
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  /**
   * @return string
   */
  public function getEventTime()
  {
    return $this->eventTime;
  }
  /**
   * @param PrimaryAdminChangedEvent
   */
  public function setPrimaryAdminChangedEvent(PrimaryAdminChangedEvent $primaryAdminChangedEvent)
  {
    $this->primaryAdminChangedEvent = $primaryAdminChangedEvent;
  }
  /**
   * @return PrimaryAdminChangedEvent
   */
  public function getPrimaryAdminChangedEvent()
  {
    return $this->primaryAdminChangedEvent;
  }
  /**
   * @param SSOProfileCreatedEvent
   */
  public function setSsoProfileCreatedEvent(SSOProfileCreatedEvent $ssoProfileCreatedEvent)
  {
    $this->ssoProfileCreatedEvent = $ssoProfileCreatedEvent;
  }
  /**
   * @return SSOProfileCreatedEvent
   */
  public function getSsoProfileCreatedEvent()
  {
    return $this->ssoProfileCreatedEvent;
  }
  /**
   * @param SSOProfileDeletedEvent
   */
  public function setSsoProfileDeletedEvent(SSOProfileDeletedEvent $ssoProfileDeletedEvent)
  {
    $this->ssoProfileDeletedEvent = $ssoProfileDeletedEvent;
  }
  /**
   * @return SSOProfileDeletedEvent
   */
  public function getSsoProfileDeletedEvent()
  {
    return $this->ssoProfileDeletedEvent;
  }
  /**
   * @param SSOProfileUpdatedEvent
   */
  public function setSsoProfileUpdatedEvent(SSOProfileUpdatedEvent $ssoProfileUpdatedEvent)
  {
    $this->ssoProfileUpdatedEvent = $ssoProfileUpdatedEvent;
  }
  /**
   * @return SSOProfileUpdatedEvent
   */
  public function getSsoProfileUpdatedEvent()
  {
    return $this->ssoProfileUpdatedEvent;
  }
  /**
   * @param SuperAdminPasswordResetEvent
   */
  public function setSuperAdminPasswordResetEvent(SuperAdminPasswordResetEvent $superAdminPasswordResetEvent)
  {
    $this->superAdminPasswordResetEvent = $superAdminPasswordResetEvent;
  }
  /**
   * @return SuperAdminPasswordResetEvent
   */
  public function getSuperAdminPasswordResetEvent()
  {
    return $this->superAdminPasswordResetEvent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SensitiveAdminAction::class, 'Google_Service_AlertCenter_SensitiveAdminAction');
