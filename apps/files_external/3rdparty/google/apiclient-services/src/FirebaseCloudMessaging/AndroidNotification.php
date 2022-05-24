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

namespace Google\Service\FirebaseCloudMessaging;

class AndroidNotification extends \Google\Collection
{
  protected $collection_key = 'vibrateTimings';
  /**
   * @var string
   */
  public $body;
  /**
   * @var string[]
   */
  public $bodyLocArgs;
  /**
   * @var string
   */
  public $bodyLocKey;
  /**
   * @var bool
   */
  public $bypassProxyNotification;
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string
   */
  public $clickAction;
  /**
   * @var string
   */
  public $color;
  /**
   * @var bool
   */
  public $defaultLightSettings;
  /**
   * @var bool
   */
  public $defaultSound;
  /**
   * @var bool
   */
  public $defaultVibrateTimings;
  /**
   * @var string
   */
  public $eventTime;
  /**
   * @var string
   */
  public $icon;
  /**
   * @var string
   */
  public $image;
  protected $lightSettingsType = LightSettings::class;
  protected $lightSettingsDataType = '';
  /**
   * @var bool
   */
  public $localOnly;
  /**
   * @var int
   */
  public $notificationCount;
  /**
   * @var string
   */
  public $notificationPriority;
  /**
   * @var string
   */
  public $sound;
  /**
   * @var bool
   */
  public $sticky;
  /**
   * @var string
   */
  public $tag;
  /**
   * @var string
   */
  public $ticker;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string[]
   */
  public $titleLocArgs;
  /**
   * @var string
   */
  public $titleLocKey;
  /**
   * @var string[]
   */
  public $vibrateTimings;
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param string[]
   */
  public function setBodyLocArgs($bodyLocArgs)
  {
    $this->bodyLocArgs = $bodyLocArgs;
  }
  /**
   * @return string[]
   */
  public function getBodyLocArgs()
  {
    return $this->bodyLocArgs;
  }
  /**
   * @param string
   */
  public function setBodyLocKey($bodyLocKey)
  {
    $this->bodyLocKey = $bodyLocKey;
  }
  /**
   * @return string
   */
  public function getBodyLocKey()
  {
    return $this->bodyLocKey;
  }
  /**
   * @param bool
   */
  public function setBypassProxyNotification($bypassProxyNotification)
  {
    $this->bypassProxyNotification = $bypassProxyNotification;
  }
  /**
   * @return bool
   */
  public function getBypassProxyNotification()
  {
    return $this->bypassProxyNotification;
  }
  /**
   * @param string
   */
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  /**
   * @return string
   */
  public function getChannelId()
  {
    return $this->channelId;
  }
  /**
   * @param string
   */
  public function setClickAction($clickAction)
  {
    $this->clickAction = $clickAction;
  }
  /**
   * @return string
   */
  public function getClickAction()
  {
    return $this->clickAction;
  }
  /**
   * @param string
   */
  public function setColor($color)
  {
    $this->color = $color;
  }
  /**
   * @return string
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param bool
   */
  public function setDefaultLightSettings($defaultLightSettings)
  {
    $this->defaultLightSettings = $defaultLightSettings;
  }
  /**
   * @return bool
   */
  public function getDefaultLightSettings()
  {
    return $this->defaultLightSettings;
  }
  /**
   * @param bool
   */
  public function setDefaultSound($defaultSound)
  {
    $this->defaultSound = $defaultSound;
  }
  /**
   * @return bool
   */
  public function getDefaultSound()
  {
    return $this->defaultSound;
  }
  /**
   * @param bool
   */
  public function setDefaultVibrateTimings($defaultVibrateTimings)
  {
    $this->defaultVibrateTimings = $defaultVibrateTimings;
  }
  /**
   * @return bool
   */
  public function getDefaultVibrateTimings()
  {
    return $this->defaultVibrateTimings;
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
   * @param string
   */
  public function setIcon($icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return string
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param string
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
  /**
   * @return string
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param LightSettings
   */
  public function setLightSettings(LightSettings $lightSettings)
  {
    $this->lightSettings = $lightSettings;
  }
  /**
   * @return LightSettings
   */
  public function getLightSettings()
  {
    return $this->lightSettings;
  }
  /**
   * @param bool
   */
  public function setLocalOnly($localOnly)
  {
    $this->localOnly = $localOnly;
  }
  /**
   * @return bool
   */
  public function getLocalOnly()
  {
    return $this->localOnly;
  }
  /**
   * @param int
   */
  public function setNotificationCount($notificationCount)
  {
    $this->notificationCount = $notificationCount;
  }
  /**
   * @return int
   */
  public function getNotificationCount()
  {
    return $this->notificationCount;
  }
  /**
   * @param string
   */
  public function setNotificationPriority($notificationPriority)
  {
    $this->notificationPriority = $notificationPriority;
  }
  /**
   * @return string
   */
  public function getNotificationPriority()
  {
    return $this->notificationPriority;
  }
  /**
   * @param string
   */
  public function setSound($sound)
  {
    $this->sound = $sound;
  }
  /**
   * @return string
   */
  public function getSound()
  {
    return $this->sound;
  }
  /**
   * @param bool
   */
  public function setSticky($sticky)
  {
    $this->sticky = $sticky;
  }
  /**
   * @return bool
   */
  public function getSticky()
  {
    return $this->sticky;
  }
  /**
   * @param string
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param string
   */
  public function setTicker($ticker)
  {
    $this->ticker = $ticker;
  }
  /**
   * @return string
   */
  public function getTicker()
  {
    return $this->ticker;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string[]
   */
  public function setTitleLocArgs($titleLocArgs)
  {
    $this->titleLocArgs = $titleLocArgs;
  }
  /**
   * @return string[]
   */
  public function getTitleLocArgs()
  {
    return $this->titleLocArgs;
  }
  /**
   * @param string
   */
  public function setTitleLocKey($titleLocKey)
  {
    $this->titleLocKey = $titleLocKey;
  }
  /**
   * @return string
   */
  public function getTitleLocKey()
  {
    return $this->titleLocKey;
  }
  /**
   * @param string[]
   */
  public function setVibrateTimings($vibrateTimings)
  {
    $this->vibrateTimings = $vibrateTimings;
  }
  /**
   * @return string[]
   */
  public function getVibrateTimings()
  {
    return $this->vibrateTimings;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidNotification::class, 'Google_Service_FirebaseCloudMessaging_AndroidNotification');
