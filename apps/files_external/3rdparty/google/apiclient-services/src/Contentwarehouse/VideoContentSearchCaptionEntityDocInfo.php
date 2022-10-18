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

class VideoContentSearchCaptionEntityDocInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $entityDocCount;
  /**
   * @var string
   */
  public $entityMentionCount;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string
   */
  public $totalDocCount;
  /**
   * @var string
   */
  public $totalMentionCount;

  /**
   * @param string
   */
  public function setEntityDocCount($entityDocCount)
  {
    $this->entityDocCount = $entityDocCount;
  }
  /**
   * @return string
   */
  public function getEntityDocCount()
  {
    return $this->entityDocCount;
  }
  /**
   * @param string
   */
  public function setEntityMentionCount($entityMentionCount)
  {
    $this->entityMentionCount = $entityMentionCount;
  }
  /**
   * @return string
   */
  public function getEntityMentionCount()
  {
    return $this->entityMentionCount;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param string
   */
  public function setTotalDocCount($totalDocCount)
  {
    $this->totalDocCount = $totalDocCount;
  }
  /**
   * @return string
   */
  public function getTotalDocCount()
  {
    return $this->totalDocCount;
  }
  /**
   * @param string
   */
  public function setTotalMentionCount($totalMentionCount)
  {
    $this->totalMentionCount = $totalMentionCount;
  }
  /**
   * @return string
   */
  public function getTotalMentionCount()
  {
    return $this->totalMentionCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCaptionEntityDocInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchCaptionEntityDocInfo');
