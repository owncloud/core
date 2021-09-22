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
  public $imageThumbnail;
  public $imageUri;
  public $mimeType;
  public $signedUri;

  public function setImageThumbnail($imageThumbnail)
  {
    $this->imageThumbnail = $imageThumbnail;
  }
  public function getImageThumbnail()
  {
    return $this->imageThumbnail;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setSignedUri($signedUri)
  {
    $this->signedUri = $signedUri;
  }
  public function getSignedUri()
  {
    return $this->signedUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1ImagePayload::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePayload');
