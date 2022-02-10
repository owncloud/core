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

namespace Google\Service\AndroidManagement;

class Display extends \Google\Model
{
  /**
   * @var int
   */
  public $density;
  /**
   * @var int
   */
  public $displayId;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $refreshRate;
  /**
   * @var string
   */
  public $state;
  /**
   * @var int
   */
  public $width;

  /**
   * @param int
   */
  public function setDensity($density)
  {
    $this->density = $density;
  }
  /**
   * @return int
   */
  public function getDensity()
  {
    return $this->density;
  }
  /**
   * @param int
   */
  public function setDisplayId($displayId)
  {
    $this->displayId = $displayId;
  }
  /**
   * @return int
   */
  public function getDisplayId()
  {
    return $this->displayId;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setRefreshRate($refreshRate)
  {
    $this->refreshRate = $refreshRate;
  }
  /**
   * @return int
   */
  public function getRefreshRate()
  {
    return $this->refreshRate;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Display::class, 'Google_Service_AndroidManagement_Display');
