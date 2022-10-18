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

class GoogleAssistantAccessoryV1ScreenOutConfigDimensions extends \Google\Model
{
  /**
   * @var float
   */
  public $screenDpi;
  /**
   * @var int
   */
  public $screenHeightPx;
  /**
   * @var string
   */
  public $screenShape;
  /**
   * @var int
   */
  public $screenWidthPx;

  /**
   * @param float
   */
  public function setScreenDpi($screenDpi)
  {
    $this->screenDpi = $screenDpi;
  }
  /**
   * @return float
   */
  public function getScreenDpi()
  {
    return $this->screenDpi;
  }
  /**
   * @param int
   */
  public function setScreenHeightPx($screenHeightPx)
  {
    $this->screenHeightPx = $screenHeightPx;
  }
  /**
   * @return int
   */
  public function getScreenHeightPx()
  {
    return $this->screenHeightPx;
  }
  /**
   * @param string
   */
  public function setScreenShape($screenShape)
  {
    $this->screenShape = $screenShape;
  }
  /**
   * @return string
   */
  public function getScreenShape()
  {
    return $this->screenShape;
  }
  /**
   * @param int
   */
  public function setScreenWidthPx($screenWidthPx)
  {
    $this->screenWidthPx = $screenWidthPx;
  }
  /**
   * @return int
   */
  public function getScreenWidthPx()
  {
    return $this->screenWidthPx;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantAccessoryV1ScreenOutConfigDimensions::class, 'Google_Service_Contentwarehouse_GoogleAssistantAccessoryV1ScreenOutConfigDimensions');
