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

class GoogleAssistantEmbeddedV1Timers extends \Google\Collection
{
  protected $collection_key = 'timers';
  /**
   * @var string
   */
  public $stateFetchError;
  protected $timersType = GoogleAssistantEmbeddedV1Timer::class;
  protected $timersDataType = 'array';

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
  /**
   * @param GoogleAssistantEmbeddedV1Timer[]
   */
  public function setTimers($timers)
  {
    $this->timers = $timers;
  }
  /**
   * @return GoogleAssistantEmbeddedV1Timer[]
   */
  public function getTimers()
  {
    return $this->timers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantEmbeddedV1Timers::class, 'Google_Service_Contentwarehouse_GoogleAssistantEmbeddedV1Timers');
