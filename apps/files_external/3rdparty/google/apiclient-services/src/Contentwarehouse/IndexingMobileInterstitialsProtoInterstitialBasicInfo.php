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

class IndexingMobileInterstitialsProtoInterstitialBasicInfo extends \Google\Model
{
  protected $absoluteBoxType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $absoluteBoxDataType = '';
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $detectionMode;
  /**
   * @var string
   */
  public $layoutType;

  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setAbsoluteBox(HtmlrenderWebkitHeadlessProtoBox $absoluteBox)
  {
    $this->absoluteBox = $absoluteBox;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getAbsoluteBox()
  {
    return $this->absoluteBox;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param string
   */
  public function setDetectionMode($detectionMode)
  {
    $this->detectionMode = $detectionMode;
  }
  /**
   * @return string
   */
  public function getDetectionMode()
  {
    return $this->detectionMode;
  }
  /**
   * @param string
   */
  public function setLayoutType($layoutType)
  {
    $this->layoutType = $layoutType;
  }
  /**
   * @return string
   */
  public function getLayoutType()
  {
    return $this->layoutType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingMobileInterstitialsProtoInterstitialBasicInfo::class, 'Google_Service_Contentwarehouse_IndexingMobileInterstitialsProtoInterstitialBasicInfo');
