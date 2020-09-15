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

class Google_Service_YouTube_LinkElement extends Google_Model
{
  public $callToActionType;
  public $customLinkText;
  public $externalImageUrl;
  public $targetUrl;
  protected $uploadedImageType = 'Google_Service_YouTube_LinkElementUploadedImage';
  protected $uploadedImageDataType = '';
  public $websiteType;

  public function setCallToActionType($callToActionType)
  {
    $this->callToActionType = $callToActionType;
  }
  public function getCallToActionType()
  {
    return $this->callToActionType;
  }
  public function setCustomLinkText($customLinkText)
  {
    $this->customLinkText = $customLinkText;
  }
  public function getCustomLinkText()
  {
    return $this->customLinkText;
  }
  public function setExternalImageUrl($externalImageUrl)
  {
    $this->externalImageUrl = $externalImageUrl;
  }
  public function getExternalImageUrl()
  {
    return $this->externalImageUrl;
  }
  public function setTargetUrl($targetUrl)
  {
    $this->targetUrl = $targetUrl;
  }
  public function getTargetUrl()
  {
    return $this->targetUrl;
  }
  /**
   * @param Google_Service_YouTube_LinkElementUploadedImage
   */
  public function setUploadedImage(Google_Service_YouTube_LinkElementUploadedImage $uploadedImage)
  {
    $this->uploadedImage = $uploadedImage;
  }
  /**
   * @return Google_Service_YouTube_LinkElementUploadedImage
   */
  public function getUploadedImage()
  {
    return $this->uploadedImage;
  }
  public function setWebsiteType($websiteType)
  {
    $this->websiteType = $websiteType;
  }
  public function getWebsiteType()
  {
    return $this->websiteType;
  }
}
