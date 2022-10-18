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

class IndexingEmbeddedContentPageSizeInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $numImages;
  /**
   * @var int
   */
  public $numImagesWithContent;
  /**
   * @var int
   */
  public $numResources;
  /**
   * @var int
   */
  public $numResourcesWithContent;
  /**
   * @var int
   */
  public $sumHttpResponseLength;

  /**
   * @param int
   */
  public function setNumImages($numImages)
  {
    $this->numImages = $numImages;
  }
  /**
   * @return int
   */
  public function getNumImages()
  {
    return $this->numImages;
  }
  /**
   * @param int
   */
  public function setNumImagesWithContent($numImagesWithContent)
  {
    $this->numImagesWithContent = $numImagesWithContent;
  }
  /**
   * @return int
   */
  public function getNumImagesWithContent()
  {
    return $this->numImagesWithContent;
  }
  /**
   * @param int
   */
  public function setNumResources($numResources)
  {
    $this->numResources = $numResources;
  }
  /**
   * @return int
   */
  public function getNumResources()
  {
    return $this->numResources;
  }
  /**
   * @param int
   */
  public function setNumResourcesWithContent($numResourcesWithContent)
  {
    $this->numResourcesWithContent = $numResourcesWithContent;
  }
  /**
   * @return int
   */
  public function getNumResourcesWithContent()
  {
    return $this->numResourcesWithContent;
  }
  /**
   * @param int
   */
  public function setSumHttpResponseLength($sumHttpResponseLength)
  {
    $this->sumHttpResponseLength = $sumHttpResponseLength;
  }
  /**
   * @return int
   */
  public function getSumHttpResponseLength()
  {
    return $this->sumHttpResponseLength;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentPageSizeInfo::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentPageSizeInfo');
