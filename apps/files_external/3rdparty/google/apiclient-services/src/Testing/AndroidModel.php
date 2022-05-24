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

class AndroidModel extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $brand;
  /**
   * @var string
   */
  public $codename;
  /**
   * @var string
   */
  public $form;
  /**
   * @var string
   */
  public $formFactor;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $lowFpsVideoRecording;
  /**
   * @var string
   */
  public $manufacturer;
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
  public $supportedAbis;
  /**
   * @var string[]
   */
  public $supportedVersionIds;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $thumbnailUrl;

  /**
   * @param string
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param string
   */
  public function setCodename($codename)
  {
    $this->codename = $codename;
  }
  /**
   * @return string
   */
  public function getCodename()
  {
    return $this->codename;
  }
  /**
   * @param string
   */
  public function setForm($form)
  {
    $this->form = $form;
  }
  /**
   * @return string
   */
  public function getForm()
  {
    return $this->form;
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
   * @param bool
   */
  public function setLowFpsVideoRecording($lowFpsVideoRecording)
  {
    $this->lowFpsVideoRecording = $lowFpsVideoRecording;
  }
  /**
   * @return bool
   */
  public function getLowFpsVideoRecording()
  {
    return $this->lowFpsVideoRecording;
  }
  /**
   * @param string
   */
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  /**
   * @return string
   */
  public function getManufacturer()
  {
    return $this->manufacturer;
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
  public function setSupportedAbis($supportedAbis)
  {
    $this->supportedAbis = $supportedAbis;
  }
  /**
   * @return string[]
   */
  public function getSupportedAbis()
  {
    return $this->supportedAbis;
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
  /**
   * @param string
   */
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  /**
   * @return string
   */
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidModel::class, 'Google_Service_Testing_AndroidModel');
