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

class Google_Service_Vision_GoogleCloudVisionV1p3beta1ImportProductSetsResponse extends Google_Collection
{
  protected $collection_key = 'statuses';
  protected $referenceImagesType = 'Google_Service_Vision_GoogleCloudVisionV1p3beta1ReferenceImage';
  protected $referenceImagesDataType = 'array';
  protected $statusesType = 'Google_Service_Vision_Status';
  protected $statusesDataType = 'array';

  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p3beta1ReferenceImage[]
   */
  public function setReferenceImages($referenceImages)
  {
    $this->referenceImages = $referenceImages;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p3beta1ReferenceImage[]
   */
  public function getReferenceImages()
  {
    return $this->referenceImages;
  }
  /**
   * @param Google_Service_Vision_Status[]
   */
  public function setStatuses($statuses)
  {
    $this->statuses = $statuses;
  }
  /**
   * @return Google_Service_Vision_Status[]
   */
  public function getStatuses()
  {
    return $this->statuses;
  }
}
