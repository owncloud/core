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

class NlpSemanticParsingDatetimeEvent extends \Google\Model
{
  protected $moonEventType = NlpSemanticParsingDatetimeMoonEventInfo::class;
  protected $moonEventDataType = '';
  /**
   * @var string
   */
  public $sunEvent;
  /**
   * @var string
   */
  public $type;

  /**
   * @param NlpSemanticParsingDatetimeMoonEventInfo
   */
  public function setMoonEvent(NlpSemanticParsingDatetimeMoonEventInfo $moonEvent)
  {
    $this->moonEvent = $moonEvent;
  }
  /**
   * @return NlpSemanticParsingDatetimeMoonEventInfo
   */
  public function getMoonEvent()
  {
    return $this->moonEvent;
  }
  /**
   * @param string
   */
  public function setSunEvent($sunEvent)
  {
    $this->sunEvent = $sunEvent;
  }
  /**
   * @return string
   */
  public function getSunEvent()
  {
    return $this->sunEvent;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeEvent::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeEvent');
