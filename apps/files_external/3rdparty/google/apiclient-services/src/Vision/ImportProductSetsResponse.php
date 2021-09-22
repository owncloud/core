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

class ImportProductSetsResponse extends \Google\Collection
{
  protected $collection_key = 'statuses';
  protected $referenceImagesType = ReferenceImage::class;
  protected $referenceImagesDataType = 'array';
  protected $statusesType = Status::class;
  protected $statusesDataType = 'array';

  /**
   * @param ReferenceImage[]
   */
  public function setReferenceImages($referenceImages)
  {
    $this->referenceImages = $referenceImages;
  }
  /**
   * @return ReferenceImage[]
   */
  public function getReferenceImages()
  {
    return $this->referenceImages;
  }
  /**
   * @param Status[]
   */
  public function setStatuses($statuses)
  {
    $this->statuses = $statuses;
  }
  /**
   * @return Status[]
   */
  public function getStatuses()
  {
    return $this->statuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImportProductSetsResponse::class, 'Google_Service_Vision_ImportProductSetsResponse');
