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

class AssistantApiGestureCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $gestureSensing;
  /**
   * @var bool
   */
  public $omniswipeGestureCapable;
  /**
   * @var bool
   */
  public $tapGestureCapable;

  /**
   * @param bool
   */
  public function setGestureSensing($gestureSensing)
  {
    $this->gestureSensing = $gestureSensing;
  }
  /**
   * @return bool
   */
  public function getGestureSensing()
  {
    return $this->gestureSensing;
  }
  /**
   * @param bool
   */
  public function setOmniswipeGestureCapable($omniswipeGestureCapable)
  {
    $this->omniswipeGestureCapable = $omniswipeGestureCapable;
  }
  /**
   * @return bool
   */
  public function getOmniswipeGestureCapable()
  {
    return $this->omniswipeGestureCapable;
  }
  /**
   * @param bool
   */
  public function setTapGestureCapable($tapGestureCapable)
  {
    $this->tapGestureCapable = $tapGestureCapable;
  }
  /**
   * @return bool
   */
  public function getTapGestureCapable()
  {
    return $this->tapGestureCapable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiGestureCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiGestureCapabilities');
