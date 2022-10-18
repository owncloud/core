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

class AssistantLogsMediaFocusesLog extends \Google\Collection
{
  protected $collection_key = 'nearbyMediaFocuses';
  /**
   * @var bool
   */
  public $dialogTriggered;
  protected $localMediaFocusType = AssistantLogsMediaFocusInfoLog::class;
  protected $localMediaFocusDataType = '';
  protected $mediaFocusesType = AssistantLogsMediaFocusInfoLog::class;
  protected $mediaFocusesDataType = 'array';
  protected $nearbyMediaFocusesType = AssistantLogsMediaFocusInfoLog::class;
  protected $nearbyMediaFocusesDataType = 'array';

  /**
   * @param bool
   */
  public function setDialogTriggered($dialogTriggered)
  {
    $this->dialogTriggered = $dialogTriggered;
  }
  /**
   * @return bool
   */
  public function getDialogTriggered()
  {
    return $this->dialogTriggered;
  }
  /**
   * @param AssistantLogsMediaFocusInfoLog
   */
  public function setLocalMediaFocus(AssistantLogsMediaFocusInfoLog $localMediaFocus)
  {
    $this->localMediaFocus = $localMediaFocus;
  }
  /**
   * @return AssistantLogsMediaFocusInfoLog
   */
  public function getLocalMediaFocus()
  {
    return $this->localMediaFocus;
  }
  /**
   * @param AssistantLogsMediaFocusInfoLog[]
   */
  public function setMediaFocuses($mediaFocuses)
  {
    $this->mediaFocuses = $mediaFocuses;
  }
  /**
   * @return AssistantLogsMediaFocusInfoLog[]
   */
  public function getMediaFocuses()
  {
    return $this->mediaFocuses;
  }
  /**
   * @param AssistantLogsMediaFocusInfoLog[]
   */
  public function setNearbyMediaFocuses($nearbyMediaFocuses)
  {
    $this->nearbyMediaFocuses = $nearbyMediaFocuses;
  }
  /**
   * @return AssistantLogsMediaFocusInfoLog[]
   */
  public function getNearbyMediaFocuses()
  {
    return $this->nearbyMediaFocuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsMediaFocusesLog::class, 'Google_Service_Contentwarehouse_AssistantLogsMediaFocusesLog');
