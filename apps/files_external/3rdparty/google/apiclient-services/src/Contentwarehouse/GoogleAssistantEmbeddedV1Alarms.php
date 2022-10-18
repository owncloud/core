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

class GoogleAssistantEmbeddedV1Alarms extends \Google\Collection
{
  protected $collection_key = 'alarms';
  protected $alarmsType = GoogleAssistantEmbeddedV1Alarm::class;
  protected $alarmsDataType = 'array';
  /**
   * @var string
   */
  public $snoozeDuration;
  /**
   * @var string
   */
  public $stateFetchError;

  /**
   * @param GoogleAssistantEmbeddedV1Alarm[]
   */
  public function setAlarms($alarms)
  {
    $this->alarms = $alarms;
  }
  /**
   * @return GoogleAssistantEmbeddedV1Alarm[]
   */
  public function getAlarms()
  {
    return $this->alarms;
  }
  /**
   * @param string
   */
  public function setSnoozeDuration($snoozeDuration)
  {
    $this->snoozeDuration = $snoozeDuration;
  }
  /**
   * @return string
   */
  public function getSnoozeDuration()
  {
    return $this->snoozeDuration;
  }
  /**
   * @param string
   */
  public function setStateFetchError($stateFetchError)
  {
    $this->stateFetchError = $stateFetchError;
  }
  /**
   * @return string
   */
  public function getStateFetchError()
  {
    return $this->stateFetchError;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantEmbeddedV1Alarms::class, 'Google_Service_Contentwarehouse_GoogleAssistantEmbeddedV1Alarms');
