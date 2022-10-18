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

namespace Google\Service\Contentwarehouse;

class AssistantApiSystemNotificationRestrictions extends \Google\Collection
{
  protected $collection_key = 'channelState';
  protected $categoryStateType = AssistantApiSystemNotificationRestrictionsNotificationCategoryState::class;
  protected $categoryStateDataType = 'array';
  protected $channelStateType = AssistantApiSystemNotificationRestrictionsNotificationChannelState::class;
  protected $channelStateDataType = 'array';
  /**
   * @var string
   */
  public $notificationCapabilities;

  /**
   * @param AssistantApiSystemNotificationRestrictionsNotificationCategoryState[]
   */
  public function setCategoryState($categoryState)
  {
    $this->categoryState = $categoryState;
  }
  /**
   * @return AssistantApiSystemNotificationRestrictionsNotificationCategoryState[]
   */
  public function getCategoryState()
  {
    return $this->categoryState;
  }
  /**
   * @param AssistantApiSystemNotificationRestrictionsNotificationChannelState[]
   */
  public function setChannelState($channelState)
  {
    $this->channelState = $channelState;
  }
  /**
   * @return AssistantApiSystemNotificationRestrictionsNotificationChannelState[]
   */
  public function getChannelState()
  {
    return $this->channelState;
  }
  /**
   * @param string
   */
  public function setNotificationCapabilities($notificationCapabilities)
  {
    $this->notificationCapabilities = $notificationCapabilities;
  }
  /**
   * @return string
   */
  public function getNotificationCapabilities()
  {
    return $this->notificationCapabilities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSystemNotificationRestrictions::class, 'Google_Service_Contentwarehouse_AssistantApiSystemNotificationRestrictions');
