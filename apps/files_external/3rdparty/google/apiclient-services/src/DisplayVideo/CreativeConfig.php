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

namespace Google\Service\DisplayVideo;

class CreativeConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $creativeType;
  protected $displayCreativeConfigType = InventorySourceDisplayCreativeConfig::class;
  protected $displayCreativeConfigDataType = '';
  protected $videoCreativeConfigType = InventorySourceVideoCreativeConfig::class;
  protected $videoCreativeConfigDataType = '';

  /**
   * @param string
   */
  public function setCreativeType($creativeType)
  {
    $this->creativeType = $creativeType;
  }
  /**
   * @return string
   */
  public function getCreativeType()
  {
    return $this->creativeType;
  }
  /**
   * @param InventorySourceDisplayCreativeConfig
   */
  public function setDisplayCreativeConfig(InventorySourceDisplayCreativeConfig $displayCreativeConfig)
  {
    $this->displayCreativeConfig = $displayCreativeConfig;
  }
  /**
   * @return InventorySourceDisplayCreativeConfig
   */
  public function getDisplayCreativeConfig()
  {
    return $this->displayCreativeConfig;
  }
  /**
   * @param InventorySourceVideoCreativeConfig
   */
  public function setVideoCreativeConfig(InventorySourceVideoCreativeConfig $videoCreativeConfig)
  {
    $this->videoCreativeConfig = $videoCreativeConfig;
  }
  /**
   * @return InventorySourceVideoCreativeConfig
   */
  public function getVideoCreativeConfig()
  {
    return $this->videoCreativeConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeConfig::class, 'Google_Service_DisplayVideo_CreativeConfig');
