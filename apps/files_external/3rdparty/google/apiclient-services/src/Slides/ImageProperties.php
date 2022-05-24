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

namespace Google\Service\Slides;

class ImageProperties extends \Google\Model
{
  /**
   * @var float
   */
  public $brightness;
  /**
   * @var float
   */
  public $contrast;
  protected $cropPropertiesType = CropProperties::class;
  protected $cropPropertiesDataType = '';
  protected $linkType = Link::class;
  protected $linkDataType = '';
  protected $outlineType = Outline::class;
  protected $outlineDataType = '';
  protected $recolorType = Recolor::class;
  protected $recolorDataType = '';
  protected $shadowType = Shadow::class;
  protected $shadowDataType = '';
  /**
   * @var float
   */
  public $transparency;

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
   * @param Link
   */
  public function setLink(Link $link)
  {
    $this->link = $link;
  }
  /**
   * @return Link
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param Outline
   */
  public function setOutline(Outline $outline)
  {
    $this->outline = $outline;
  }
  /**
   * @return Outline
   */
  public function getOutline()
  {
    return $this->outline;
  }
  /**
   * @param Recolor
   */
  public function setRecolor(Recolor $recolor)
  {
    $this->recolor = $recolor;
  }
  /**
   * @return Recolor
   */
  public function getRecolor()
  {
    return $this->recolor;
  }
  /**
   * @param Shadow
   */
  public function setShadow(Shadow $shadow)
  {
    $this->shadow = $shadow;
  }
  /**
   * @return Shadow
   */
  public function getShadow()
  {
    return $this->shadow;
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
class_alias(ImageProperties::class, 'Google_Service_Slides_ImageProperties');
