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

class Google_Service_CloudHealthcare_Signature extends Google_Model
{
  protected $imageType = 'Google_Service_CloudHealthcare_Image';
  protected $imageDataType = '';
  public $metadata;
  public $signatureTime;
  public $userId;

  /**
   * @param Google_Service_CloudHealthcare_Image
   */
  public function setImage(Google_Service_CloudHealthcare_Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_CloudHealthcare_Image
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setSignatureTime($signatureTime)
  {
    $this->signatureTime = $signatureTime;
  }
  public function getSignatureTime()
  {
    return $this->signatureTime;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
