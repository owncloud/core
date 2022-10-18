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

class VideoContentSearchVideoGeneratedQueryFeatures extends \Google\Collection
{
  protected $collection_key = 'filterReason';
  /**
   * @var string[]
   */
  public $filterReason;
  /**
   * @var int
   */
  public $prefilteredPassageCount;
  protected $titleEntityAnnotationsType = VideoContentSearchEntityAnnotations::class;
  protected $titleEntityAnnotationsDataType = '';
  /**
   * @var int
   */
  public $totalRestrictedQueries;

  /**
   * @param string[]
   */
  public function setFilterReason($filterReason)
  {
    $this->filterReason = $filterReason;
  }
  /**
   * @return string[]
   */
  public function getFilterReason()
  {
    return $this->filterReason;
  }
  /**
   * @param int
   */
  public function setPrefilteredPassageCount($prefilteredPassageCount)
  {
    $this->prefilteredPassageCount = $prefilteredPassageCount;
  }
  /**
   * @return int
   */
  public function getPrefilteredPassageCount()
  {
    return $this->prefilteredPassageCount;
  }
  /**
   * @param VideoContentSearchEntityAnnotations
   */
  public function setTitleEntityAnnotations(VideoContentSearchEntityAnnotations $titleEntityAnnotations)
  {
    $this->titleEntityAnnotations = $titleEntityAnnotations;
  }
  /**
   * @return VideoContentSearchEntityAnnotations
   */
  public function getTitleEntityAnnotations()
  {
    return $this->titleEntityAnnotations;
  }
  /**
   * @param int
   */
  public function setTotalRestrictedQueries($totalRestrictedQueries)
  {
    $this->totalRestrictedQueries = $totalRestrictedQueries;
  }
  /**
   * @return int
   */
  public function getTotalRestrictedQueries()
  {
    return $this->totalRestrictedQueries;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoGeneratedQueryFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoGeneratedQueryFeatures');
