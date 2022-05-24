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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1ImagePayload extends \Google\Model
{
  /**
   * @var string
   */
  public $imageThumbnail;
  /**
   * @var string
   */
  public $imageUri;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $signedUri;

  /**
   * @param string
   */
  public function setImageThumbnail($imageThumbnail)
  {
    $this->imageThumbnail = $imageThumbnail;
  }
  /**
   * @return string
   */
  public function getImageThumbnail()
  {
    return $this->imageThumbnail;
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
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setSignedUri($signedUri)
  {
    $this->signedUri = $signedUri;
  }
  /**
   * @return string
   */
  public function getSignedUri()
  {
    return $this->signedUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1ImagePayload::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePayload');
