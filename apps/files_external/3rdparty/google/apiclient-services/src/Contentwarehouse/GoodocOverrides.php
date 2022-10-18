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

namespace Google\Service\Contentwarehouse;

class GoodocOverrides extends \Google\Collection
{
  protected $collection_key = 'style';
  /**
   * @var string
   */
  public $blockImagination;
  /**
   * @var bool
   */
  public $doNotExpandGraphicBox;
  /**
   * @var string
   */
  public $fullPageAsImage;
  /**
   * @var string
   */
  public $fullPageLineated;
  /**
   * @var string
   */
  public $fullPageSkipped;
  /**
   * @var bool
   */
  public $needNotSuppressPhoto;
  /**
   * @var string
   */
  public $pageBreakBefore;
  protected $styleType = GoodocOverridesStyle::class;
  protected $styleDataType = 'array';
  /**
   * @var string
   */
  public $wordHtml;

  /**
   * @param string
   */
  public function setBlockImagination($blockImagination)
  {
    $this->blockImagination = $blockImagination;
  }
  /**
   * @return string
   */
  public function getBlockImagination()
  {
    return $this->blockImagination;
  }
  /**
   * @param bool
   */
  public function setDoNotExpandGraphicBox($doNotExpandGraphicBox)
  {
    $this->doNotExpandGraphicBox = $doNotExpandGraphicBox;
  }
  /**
   * @return bool
   */
  public function getDoNotExpandGraphicBox()
  {
    return $this->doNotExpandGraphicBox;
  }
  /**
   * @param string
   */
  public function setFullPageAsImage($fullPageAsImage)
  {
    $this->fullPageAsImage = $fullPageAsImage;
  }
  /**
   * @return string
   */
  public function getFullPageAsImage()
  {
    return $this->fullPageAsImage;
  }
  /**
   * @param string
   */
  public function setFullPageLineated($fullPageLineated)
  {
    $this->fullPageLineated = $fullPageLineated;
  }
  /**
   * @return string
   */
  public function getFullPageLineated()
  {
    return $this->fullPageLineated;
  }
  /**
   * @param string
   */
  public function setFullPageSkipped($fullPageSkipped)
  {
    $this->fullPageSkipped = $fullPageSkipped;
  }
  /**
   * @return string
   */
  public function getFullPageSkipped()
  {
    return $this->fullPageSkipped;
  }
  /**
   * @param bool
   */
  public function setNeedNotSuppressPhoto($needNotSuppressPhoto)
  {
    $this->needNotSuppressPhoto = $needNotSuppressPhoto;
  }
  /**
   * @return bool
   */
  public function getNeedNotSuppressPhoto()
  {
    return $this->needNotSuppressPhoto;
  }
  /**
   * @param string
   */
  public function setPageBreakBefore($pageBreakBefore)
  {
    $this->pageBreakBefore = $pageBreakBefore;
  }
  /**
   * @return string
   */
  public function getPageBreakBefore()
  {
    return $this->pageBreakBefore;
  }
  /**
   * @param GoodocOverridesStyle[]
   */
  public function setStyle($style)
  {
    $this->style = $style;
  }
  /**
   * @return GoodocOverridesStyle[]
   */
  public function getStyle()
  {
    return $this->style;
  }
  /**
   * @param string
   */
  public function setWordHtml($wordHtml)
  {
    $this->wordHtml = $wordHtml;
  }
  /**
   * @return string
   */
  public function getWordHtml()
  {
    return $this->wordHtml;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocOverrides::class, 'Google_Service_Contentwarehouse_GoodocOverrides');
