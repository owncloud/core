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

class Google_Service_DisplayVideo_CreativeConfig extends Google_Model
{
  public $creativeType;
  protected $displayCreativeConfigType = 'Google_Service_DisplayVideo_InventorySourceDisplayCreativeConfig';
  protected $displayCreativeConfigDataType = '';
  protected $videoCreativeConfigType = 'Google_Service_DisplayVideo_InventorySourceVideoCreativeConfig';
  protected $videoCreativeConfigDataType = '';

  public function setCreativeType($creativeType)
  {
    $this->creativeType = $creativeType;
  }
  public function getCreativeType()
  {
    return $this->creativeType;
  }
  /**
   * @param Google_Service_DisplayVideo_InventorySourceDisplayCreativeConfig
   */
  public function setDisplayCreativeConfig(Google_Service_DisplayVideo_InventorySourceDisplayCreativeConfig $displayCreativeConfig)
  {
    $this->displayCreativeConfig = $displayCreativeConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_InventorySourceDisplayCreativeConfig
   */
  public function getDisplayCreativeConfig()
  {
    return $this->displayCreativeConfig;
  }
  /**
   * @param Google_Service_DisplayVideo_InventorySourceVideoCreativeConfig
   */
  public function setVideoCreativeConfig(Google_Service_DisplayVideo_InventorySourceVideoCreativeConfig $videoCreativeConfig)
  {
    $this->videoCreativeConfig = $videoCreativeConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_InventorySourceVideoCreativeConfig
   */
  public function getVideoCreativeConfig()
  {
    return $this->videoCreativeConfig;
  }
}
