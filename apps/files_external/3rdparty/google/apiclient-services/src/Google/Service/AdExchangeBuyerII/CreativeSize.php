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

class Google_Service_AdExchangeBuyerII_CreativeSize extends Google_Collection
{
  protected $collection_key = 'companionSizes';
  public $allowedFormats;
  protected $companionSizesType = 'Google_Service_AdExchangeBuyerII_Size';
  protected $companionSizesDataType = 'array';
  public $creativeSizeType;
  public $nativeTemplate;
  protected $sizeType = 'Google_Service_AdExchangeBuyerII_Size';
  protected $sizeDataType = '';
  public $skippableAdType;

  public function setAllowedFormats($allowedFormats)
  {
    $this->allowedFormats = $allowedFormats;
  }
  public function getAllowedFormats()
  {
    return $this->allowedFormats;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Size
   */
  public function setCompanionSizes($companionSizes)
  {
    $this->companionSizes = $companionSizes;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Size
   */
  public function getCompanionSizes()
  {
    return $this->companionSizes;
  }
  public function setCreativeSizeType($creativeSizeType)
  {
    $this->creativeSizeType = $creativeSizeType;
  }
  public function getCreativeSizeType()
  {
    return $this->creativeSizeType;
  }
  public function setNativeTemplate($nativeTemplate)
  {
    $this->nativeTemplate = $nativeTemplate;
  }
  public function getNativeTemplate()
  {
    return $this->nativeTemplate;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Size
   */
  public function setSize(Google_Service_AdExchangeBuyerII_Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Size
   */
  public function getSize()
  {
    return $this->size;
  }
  public function setSkippableAdType($skippableAdType)
  {
    $this->skippableAdType = $skippableAdType;
  }
  public function getSkippableAdType()
  {
    return $this->skippableAdType;
  }
}
