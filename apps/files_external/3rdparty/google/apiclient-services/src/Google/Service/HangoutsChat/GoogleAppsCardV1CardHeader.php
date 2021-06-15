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

class Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader extends Google_Model
{
  public $imageAltText;
  public $imageType;
  public $imageUrl;
  public $subtitle;
  public $title;

  public function setImageAltText($imageAltText)
  {
    $this->imageAltText = $imageAltText;
  }
  public function getImageAltText()
  {
    return $this->imageAltText;
  }
  public function setImageType($imageType)
  {
    $this->imageType = $imageType;
  }
  public function getImageType()
  {
    return $this->imageType;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  public function getSubtitle()
  {
    return $this->subtitle;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
