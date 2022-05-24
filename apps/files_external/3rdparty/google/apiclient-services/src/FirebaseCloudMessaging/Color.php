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

class Color extends \Google\Model
{
  /**
   * @var float
   */
  public $alpha;
  /**
   * @var float
   */
  public $blue;
  /**
   * @var float
   */
  public $green;
  /**
   * @var float
   */
  public $red;

  /**
   * @param float
   */
  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  /**
   * @return float
   */
  public function getAlpha()
  {
    return $this->alpha;
  }
  /**
   * @param float
   */
  public function setBlue($blue)
  {
    $this->blue = $blue;
  }
  /**
   * @return float
   */
  public function getBlue()
  {
    return $this->blue;
  }
  /**
   * @param float
   */
  public function setGreen($green)
  {
    $this->green = $green;
  }
  /**
   * @return float
   */
  public function getGreen()
  {
    return $this->green;
  }
  /**
   * @param float
   */
  public function setRed($red)
  {
    $this->red = $red;
  }
  /**
   * @return float
   */
  public function getRed()
  {
    return $this->red;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Color::class, 'Google_Service_FirebaseCloudMessaging_Color');
