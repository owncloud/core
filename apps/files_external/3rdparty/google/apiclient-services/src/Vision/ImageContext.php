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

namespace Google\Service\Vision;

class ImageContext extends \Google\Collection
{
  protected $collection_key = 'languageHints';
  protected $cropHintsParamsType = CropHintsParams::class;
  protected $cropHintsParamsDataType = '';
  public $languageHints;
  protected $latLongRectType = LatLongRect::class;
  protected $latLongRectDataType = '';
  protected $productSearchParamsType = ProductSearchParams::class;
  protected $productSearchParamsDataType = '';
  protected $textDetectionParamsType = TextDetectionParams::class;
  protected $textDetectionParamsDataType = '';
  protected $webDetectionParamsType = WebDetectionParams::class;
  protected $webDetectionParamsDataType = '';

  /**
   * @param CropHintsParams
   */
  public function setCropHintsParams(CropHintsParams $cropHintsParams)
  {
    $this->cropHintsParams = $cropHintsParams;
  }
  /**
   * @return CropHintsParams
   */
  public function getCropHintsParams()
  {
    return $this->cropHintsParams;
  }
  public function setLanguageHints($languageHints)
  {
    $this->languageHints = $languageHints;
  }
  public function getLanguageHints()
  {
    return $this->languageHints;
  }
  /**
   * @param LatLongRect
   */
  public function setLatLongRect(LatLongRect $latLongRect)
  {
    $this->latLongRect = $latLongRect;
  }
  /**
   * @return LatLongRect
   */
  public function getLatLongRect()
  {
    return $this->latLongRect;
  }
  /**
   * @param ProductSearchParams
   */
  public function setProductSearchParams(ProductSearchParams $productSearchParams)
  {
    $this->productSearchParams = $productSearchParams;
  }
  /**
   * @return ProductSearchParams
   */
  public function getProductSearchParams()
  {
    return $this->productSearchParams;
  }
  /**
   * @param TextDetectionParams
   */
  public function setTextDetectionParams(TextDetectionParams $textDetectionParams)
  {
    $this->textDetectionParams = $textDetectionParams;
  }
  /**
   * @return TextDetectionParams
   */
  public function getTextDetectionParams()
  {
    return $this->textDetectionParams;
  }
  /**
   * @param WebDetectionParams
   */
  public function setWebDetectionParams(WebDetectionParams $webDetectionParams)
  {
    $this->webDetectionParams = $webDetectionParams;
  }
  /**
   * @return WebDetectionParams
   */
  public function getWebDetectionParams()
  {
    return $this->webDetectionParams;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageContext::class, 'Google_Service_Vision_ImageContext');
