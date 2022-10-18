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

class GoogleAssistantAccessoryV1AudioOutConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $audioMode;
  /**
   * @var string
   */
  public $audioRoutingMode;
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var int
   */
  public $preferredBitrateBps;

  /**
   * @param string
   */
  public function setAudioMode($audioMode)
  {
    $this->audioMode = $audioMode;
  }
  /**
   * @return string
   */
  public function getAudioMode()
  {
    return $this->audioMode;
  }
  /**
   * @param string
   */
  public function setAudioRoutingMode($audioRoutingMode)
  {
    $this->audioRoutingMode = $audioRoutingMode;
  }
  /**
   * @return string
   */
  public function getAudioRoutingMode()
  {
    return $this->audioRoutingMode;
  }
  /**
   * @param string
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  /**
   * @return string
   */
  public function getEncoding()
  {
    return $this->encoding;
  }
  /**
   * @param int
   */
  public function setPreferredBitrateBps($preferredBitrateBps)
  {
    $this->preferredBitrateBps = $preferredBitrateBps;
  }
  /**
   * @return int
   */
  public function getPreferredBitrateBps()
  {
    return $this->preferredBitrateBps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantAccessoryV1AudioOutConfig::class, 'Google_Service_Contentwarehouse_GoogleAssistantAccessoryV1AudioOutConfig');
