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

namespace Google\Service\Testing;

class IosModel extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string[]
   */
  public $deviceCapabilities;
  /**
   * @var string
   */
  public $formFactor;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $screenDensity;
  /**
   * @var int
   */
  public $screenX;
  /**
   * @var int
   */
  public $screenY;
  /**
   * @var string[]
   */
  public $supportedVersionIds;
  /**
   * @var string[]
   */
  public $tags;

  /**
   * @param string[]
   */
  public function setDeviceCapabilities($deviceCapabilities)
  {
    $this->deviceCapabilities = $deviceCapabilities;
  }
  /**
   * @return string[]
   */
  public function getDeviceCapabilities()
  {
    return $this->deviceCapabilities;
  }
  /**
   * @param string
   */
  public function setFormFactor($formFactor)
  {
    $this->formFactor = $formFactor;
  }
  /**
   * @return string
   */
  public function getFormFactor()
  {
    return $this->formFactor;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
  public function setScreenDensity($screenDensity)
  {
    $this->screenDensity = $screenDensity;
  }
  /**
   * @return int
   */
  public function getScreenDensity()
  {
    return $this->screenDensity;
  }
  /**
   * @param int
   */
  public function setScreenX($screenX)
  {
    $this->screenX = $screenX;
  }
  /**
   * @return int
   */
  public function getScreenX()
  {
    return $this->screenX;
  }
  /**
   * @param int
   */
  public function setScreenY($screenY)
  {
    $this->screenY = $screenY;
  }
  /**
   * @return int
   */
  public function getScreenY()
  {
    return $this->screenY;
  }
  /**
   * @param string[]
   */
  public function setSupportedVersionIds($supportedVersionIds)
  {
    $this->supportedVersionIds = $supportedVersionIds;
  }
  /**
   * @return string[]
   */
  public function getSupportedVersionIds()
  {
    return $this->supportedVersionIds;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosModel::class, 'Google_Service_Testing_IosModel');
