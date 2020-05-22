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

class Google_Service_FirebaseCloudMessaging_AndroidNotification extends Google_Collection
{
  protected $collection_key = 'vibrateTimings';
  public $body;
  public $bodyLocArgs;
  public $bodyLocKey;
  public $channelId;
  public $clickAction;
  public $color;
  public $defaultLightSettings;
  public $defaultSound;
  public $defaultVibrateTimings;
  public $eventTime;
  public $icon;
  public $image;
  protected $lightSettingsType = 'Google_Service_FirebaseCloudMessaging_LightSettings';
  protected $lightSettingsDataType = '';
  public $localOnly;
  public $notificationCount;
  public $notificationPriority;
  public $sound;
  public $sticky;
  public $tag;
  public $ticker;
  public $title;
  public $titleLocArgs;
  public $titleLocKey;
  public $vibrateTimings;
  public $visibility;

  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setBodyLocArgs($bodyLocArgs)
  {
    $this->bodyLocArgs = $bodyLocArgs;
  }
  public function getBodyLocArgs()
  {
    return $this->bodyLocArgs;
  }
  public function setBodyLocKey($bodyLocKey)
  {
    $this->bodyLocKey = $bodyLocKey;
  }
  public function getBodyLocKey()
  {
    return $this->bodyLocKey;
  }
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setClickAction($clickAction)
  {
    $this->clickAction = $clickAction;
  }
  public function getClickAction()
  {
    return $this->clickAction;
  }
  public function setColor($color)
  {
    $this->color = $color;
  }
  public function getColor()
  {
    return $this->color;
  }
  public function setDefaultLightSettings($defaultLightSettings)
  {
    $this->defaultLightSettings = $defaultLightSettings;
  }
  public function getDefaultLightSettings()
  {
    return $this->defaultLightSettings;
  }
  public function setDefaultSound($defaultSound)
  {
    $this->defaultSound = $defaultSound;
  }
  public function getDefaultSound()
  {
    return $this->defaultSound;
  }
  public function setDefaultVibrateTimings($defaultVibrateTimings)
  {
    $this->defaultVibrateTimings = $defaultVibrateTimings;
  }
  public function getDefaultVibrateTimings()
  {
    return $this->defaultVibrateTimings;
  }
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  public function getEventTime()
  {
    return $this->eventTime;
  }
  public function setIcon($icon)
  {
    $this->icon = $icon;
  }
  public function getIcon()
  {
    return $this->icon;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_FirebaseCloudMessaging_LightSettings
   */
  public function setLightSettings(Google_Service_FirebaseCloudMessaging_LightSettings $lightSettings)
  {
    $this->lightSettings = $lightSettings;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_LightSettings
   */
  public function getLightSettings()
  {
    return $this->lightSettings;
  }
  public function setLocalOnly($localOnly)
  {
    $this->localOnly = $localOnly;
  }
  public function getLocalOnly()
  {
    return $this->localOnly;
  }
  public function setNotificationCount($notificationCount)
  {
    $this->notificationCount = $notificationCount;
  }
  public function getNotificationCount()
  {
    return $this->notificationCount;
  }
  public function setNotificationPriority($notificationPriority)
  {
    $this->notificationPriority = $notificationPriority;
  }
  public function getNotificationPriority()
  {
    return $this->notificationPriority;
  }
  public function setSound($sound)
  {
    $this->sound = $sound;
  }
  public function getSound()
  {
    return $this->sound;
  }
  public function setSticky($sticky)
  {
    $this->sticky = $sticky;
  }
  public function getSticky()
  {
    return $this->sticky;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setTicker($ticker)
  {
    $this->ticker = $ticker;
  }
  public function getTicker()
  {
    return $this->ticker;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTitleLocArgs($titleLocArgs)
  {
    $this->titleLocArgs = $titleLocArgs;
  }
  public function getTitleLocArgs()
  {
    return $this->titleLocArgs;
  }
  public function setTitleLocKey($titleLocKey)
  {
    $this->titleLocKey = $titleLocKey;
  }
  public function getTitleLocKey()
  {
    return $this->titleLocKey;
  }
  public function setVibrateTimings($vibrateTimings)
  {
    $this->vibrateTimings = $vibrateTimings;
  }
  public function getVibrateTimings()
  {
    return $this->vibrateTimings;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}
