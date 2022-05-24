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

class ShapeProperties extends \Google\Model
{
  protected $autofitType = Autofit::class;
  protected $autofitDataType = '';
  /**
   * @var string
   */
  public $contentAlignment;
  protected $linkType = Link::class;
  protected $linkDataType = '';
  protected $outlineType = Outline::class;
  protected $outlineDataType = '';
  protected $shadowType = Shadow::class;
  protected $shadowDataType = '';
  protected $shapeBackgroundFillType = ShapeBackgroundFill::class;
  protected $shapeBackgroundFillDataType = '';

  /**
   * @param Autofit
   */
  public function setAutofit(Autofit $autofit)
  {
    $this->autofit = $autofit;
  }
  /**
   * @return Autofit
   */
  public function getAutofit()
  {
    return $this->autofit;
  }
  /**
   * @param string
   */
  public function setContentAlignment($contentAlignment)
  {
    $this->contentAlignment = $contentAlignment;
  }
  /**
   * @return string
   */
  public function getContentAlignment()
  {
    return $this->contentAlignment;
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
   * @param ShapeBackgroundFill
   */
  public function setShapeBackgroundFill(ShapeBackgroundFill $shapeBackgroundFill)
  {
    $this->shapeBackgroundFill = $shapeBackgroundFill;
  }
  /**
   * @return ShapeBackgroundFill
   */
  public function getShapeBackgroundFill()
  {
    return $this->shapeBackgroundFill;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ShapeProperties::class, 'Google_Service_Slides_ShapeProperties');
