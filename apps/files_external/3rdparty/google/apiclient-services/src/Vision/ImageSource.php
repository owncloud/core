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

class ImageSource extends \Google\Model
{
  /**
   * @var string
   */
  public $gcsImageUri;
  /**
   * @var string
   */
  public $imageUri;

  /**
   * @param string
   */
  public function setGcsImageUri($gcsImageUri)
  {
    $this->gcsImageUri = $gcsImageUri;
  }
  /**
   * @return string
   */
  public function getGcsImageUri()
  {
    return $this->gcsImageUri;
  }
  /**
   * @param string
   */
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  /**
   * @return string
   */
  public function getImageUri()
  {
    return $this->imageUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageSource::class, 'Google_Service_Vision_ImageSource');
