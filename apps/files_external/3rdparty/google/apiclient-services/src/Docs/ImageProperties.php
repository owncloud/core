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

namespace Google\Service\Docs;

class ImageProperties extends \Google\Model
{
  /**
   * @var float
   */
  public $angle;
  /**
   * @var float
   */
  public $brightness;
  /**
   * @var string
   */
  public $contentUri;
  /**
   * @var float
   */
  public $contrast;
  protected $cropPropertiesType = CropProperties::class;
  protected $cropPropertiesDataType = '';
  /**
   * @var string
   */
  public $sourceUri;
  /**
   * @var float
   */
  public $transparency;

  /**
   * @param float
   */
  public function setAngle($angle)
  {
    $this->angle = $angle;
  }
  /**
   * @return float
   */
  public function getAngle()
  {
    return $this->angle;
  }
  /**
   * @param float
   */
  public function setBrightness($brightness)
  {
    $this->brightness = $brightness;
  }
  /**
   * @return float
   */
  public function getBrightness()
  {
    return $this->brightness;
  }
  /**
   * @param string
   */
  public function setContentUri($contentUri)
  {
    $this->contentUri = $contentUri;
  }
  /**
   * @return string
   */
  public function getContentUri()
  {
    return $this->contentUri;
  }
  /**
   * @param float
   */
  public function setContrast($contrast)
  {
    $this->contrast = $contrast;
  }
  /**
   * @return float
   */
  public function getContrast()
  {
    return $this->contrast;
  }
  /**
   * @param CropProperties
   */
  public function setCropProperties(CropProperties $cropProperties)
  {
    $this->cropProperties = $cropProperties;
  }
  /**
   * @return CropProperties
   */
  public function getCropProperties()
  {
    return $this->cropProperties;
  }
  /**
   * @param string
   */
  public function setSourceUri($sourceUri)
  {
    $this->sourceUri = $sourceUri;
  }
  /**
   * @return string
   */
  public function getSourceUri()
  {
    return $this->sourceUri;
  }
  /**
   * @param float
   */
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  /**
   * @return float
   */
  public function getTransparency()
  {
    return $this->transparency;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageProperties::class, 'Google_Service_Docs_ImageProperties');
