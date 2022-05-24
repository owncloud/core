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

namespace Google\Service\AdExchangeBuyerII;

class CreativeSize extends \Google\Collection
{
  protected $collection_key = 'companionSizes';
  /**
   * @var string[]
   */
  public $allowedFormats;
  protected $companionSizesType = Size::class;
  protected $companionSizesDataType = 'array';
  /**
   * @var string
   */
  public $creativeSizeType;
  /**
   * @var string
   */
  public $nativeTemplate;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  /**
   * @var string
   */
  public $skippableAdType;

  /**
   * @param string[]
   */
  public function setAllowedFormats($allowedFormats)
  {
    $this->allowedFormats = $allowedFormats;
  }
  /**
   * @return string[]
   */
  public function getAllowedFormats()
  {
    return $this->allowedFormats;
  }
  /**
   * @param Size[]
   */
  public function setCompanionSizes($companionSizes)
  {
    $this->companionSizes = $companionSizes;
  }
  /**
   * @return Size[]
   */
  public function getCompanionSizes()
  {
    return $this->companionSizes;
  }
  /**
   * @param string
   */
  public function setCreativeSizeType($creativeSizeType)
  {
    $this->creativeSizeType = $creativeSizeType;
  }
  /**
   * @return string
   */
  public function getCreativeSizeType()
  {
    return $this->creativeSizeType;
  }
  /**
   * @param string
   */
  public function setNativeTemplate($nativeTemplate)
  {
    $this->nativeTemplate = $nativeTemplate;
  }
  /**
   * @return string
   */
  public function getNativeTemplate()
  {
    return $this->nativeTemplate;
  }
  /**
   * @param Size
   */
  public function setSize(Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Size
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setSkippableAdType($skippableAdType)
  {
    $this->skippableAdType = $skippableAdType;
  }
  /**
   * @return string
   */
  public function getSkippableAdType()
  {
    return $this->skippableAdType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeSize::class, 'Google_Service_AdExchangeBuyerII_CreativeSize');
