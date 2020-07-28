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

class Google_Service_YouTube_LinkCard extends Google_Model
{
  public $customLinkText;
  public $externalImageUrl;
  public $targetUrl;
  public $title;
  protected $uploadedImageType = 'Google_Service_YouTube_LinkCardUploadedImage';
  protected $uploadedImageDataType = '';

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
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Google_Service_YouTube_LinkCardUploadedImage
   */
  public function setUploadedImage(Google_Service_YouTube_LinkCardUploadedImage $uploadedImage)
  {
    $this->uploadedImage = $uploadedImage;
  }
  /**
   * @return Google_Service_YouTube_LinkCardUploadedImage
   */
  public function getUploadedImage()
  {
    return $this->uploadedImage;
  }
}
