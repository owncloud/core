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

namespace Google\Service\HangoutsChat;

class DeprecatedEvent extends \Google\Model
{
  protected $actionType = FormAction::class;
  protected $actionDataType = '';
  protected $commonType = CommonEventObject::class;
  protected $commonDataType = '';
  /**
   * @var string
   */
  public $configCompleteRedirectUrl;
  /**
   * @var string
   */
  public $dialogEventType;
  /**
   * @var string
   */
  public $eventTime;
  /**
   * @var bool
   */
  public $isDialogEvent;
  protected $messageType = Message::class;
  protected $messageDataType = '';
  protected $spaceType = Space::class;
  protected $spaceDataType = '';
  /**
   * @var string
   */
  public $threadKey;
  /**
   * @var string
   */
  public $token;
  /**
   * @var string
   */
  public $type;
  protected $userType = User::class;
  protected $userDataType = '';

  /**
   * @param FormAction
   */
  public function setAction(FormAction $action)
  {
    $this->action = $action;
  }
  /**
   * @return FormAction
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param CommonEventObject
   */
  public function setCommon(CommonEventObject $common)
  {
    $this->common = $common;
  }
  /**
   * @return CommonEventObject
   */
  public function getCommon()
  {
    return $this->common;
  }
  /**
   * @param string
   */
  public function setConfigCompleteRedirectUrl($configCompleteRedirectUrl)
  {
    $this->configCompleteRedirectUrl = $configCompleteRedirectUrl;
  }
  /**
   * @return string
   */
  public function getConfigCompleteRedirectUrl()
  {
    return $this->configCompleteRedirectUrl;
  }
  /**
   * @param string
   */
  public function setDialogEventType($dialogEventType)
  {
    $this->dialogEventType = $dialogEventType;
  }
  /**
   * @return string
   */
  public function getDialogEventType()
  {
    return $this->dialogEventType;
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
   * @param bool
   */
  public function setIsDialogEvent($isDialogEvent)
  {
    $this->isDialogEvent = $isDialogEvent;
  }
  /**
   * @return bool
   */
  public function getIsDialogEvent()
  {
    return $this->isDialogEvent;
  }
  /**
   * @param Message
   */
  public function setMessage(Message $message)
  {
    $this->message = $message;
  }
  /**
   * @return Message
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Space
   */
  public function setSpace(Space $space)
  {
    $this->space = $space;
  }
  /**
   * @return Space
   */
  public function getSpace()
  {
    return $this->space;
  }
  /**
   * @param string
   */
  public function setThreadKey($threadKey)
  {
    $this->threadKey = $threadKey;
  }
  /**
   * @return string
   */
  public function getThreadKey()
  {
    return $this->threadKey;
  }
  /**
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeprecatedEvent::class, 'Google_Service_HangoutsChat_DeprecatedEvent');
