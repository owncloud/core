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

class QualityActionsRingtone extends \Google\Collection
{
  protected $collection_key = 'soundUrl';
  protected $pauseDurationType = AssistantApiDuration::class;
  protected $pauseDurationDataType = '';
  /**
   * @var string[]
   */
  public $soundUrl;

  /**
   * @param AssistantApiDuration
   */
  public function setPauseDuration(AssistantApiDuration $pauseDuration)
  {
    $this->pauseDuration = $pauseDuration;
  }
  /**
   * @return AssistantApiDuration
   */
  public function getPauseDuration()
  {
    return $this->pauseDuration;
  }
  /**
   * @param string[]
   */
  public function setSoundUrl($soundUrl)
  {
    $this->soundUrl = $soundUrl;
  }
  /**
   * @return string[]
   */
  public function getSoundUrl()
  {
    return $this->soundUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsRingtone::class, 'Google_Service_Contentwarehouse_QualityActionsRingtone');
