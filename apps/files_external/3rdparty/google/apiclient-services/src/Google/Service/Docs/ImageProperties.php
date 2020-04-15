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

class Google_Service_Docs_ImageProperties extends Google_Model
{
  public $angle;
  public $brightness;
  public $contentUri;
  public $contrast;
  protected $cropPropertiesType = 'Google_Service_Docs_CropProperties';
  protected $cropPropertiesDataType = '';
  public $sourceUri;
  public $transparency;

  public function setAngle($angle)
  {
    $this->angle = $angle;
  }
  public function getAngle()
  {
    return $this->angle;
  }
  public function setBrightness($brightness)
  {
    $this->brightness = $brightness;
  }
  public function getBrightness()
  {
    return $this->brightness;
  }
  public function setContentUri($contentUri)
  {
    $this->contentUri = $contentUri;
  }
  public function getContentUri()
  {
    return $this->contentUri;
  }
  public function setContrast($contrast)
  {
    $this->contrast = $contrast;
  }
  public function getContrast()
  {
    return $this->contrast;
  }
  /**
   * @param Google_Service_Docs_CropProperties
   */
  public function setCropProperties(Google_Service_Docs_CropProperties $cropProperties)
  {
    $this->cropProperties = $cropProperties;
  }
  /**
   * @return Google_Service_Docs_CropProperties
   */
  public function getCropProperties()
  {
    return $this->cropProperties;
  }
  public function setSourceUri($sourceUri)
  {
    $this->sourceUri = $sourceUri;
  }
  public function getSourceUri()
  {
    return $this->sourceUri;
  }
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  public function getTransparency()
  {
    return $this->transparency;
  }
}
