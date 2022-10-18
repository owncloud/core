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

class RepositoryWebrefMentionComponent extends \Google\Model
{
  /**
   * @var int
   */
  public $entityIndex;
  /**
   * @var bool
   */
  public $isHeadComponent;
  /**
   * @var int
   */
  public $mentionIndex;
  /**
   * @var int
   */
  public $segmentMentionsIndex;

  /**
   * @param int
   */
  public function setEntityIndex($entityIndex)
  {
    $this->entityIndex = $entityIndex;
  }
  /**
   * @return int
   */
  public function getEntityIndex()
  {
    return $this->entityIndex;
  }
  /**
   * @param bool
   */
  public function setIsHeadComponent($isHeadComponent)
  {
    $this->isHeadComponent = $isHeadComponent;
  }
  /**
   * @return bool
   */
  public function getIsHeadComponent()
  {
    return $this->isHeadComponent;
  }
  /**
   * @param int
   */
  public function setMentionIndex($mentionIndex)
  {
    $this->mentionIndex = $mentionIndex;
  }
  /**
   * @return int
   */
  public function getMentionIndex()
  {
    return $this->mentionIndex;
  }
  /**
   * @param int
   */
  public function setSegmentMentionsIndex($segmentMentionsIndex)
  {
    $this->segmentMentionsIndex = $segmentMentionsIndex;
  }
  /**
   * @return int
   */
  public function getSegmentMentionsIndex()
  {
    return $this->segmentMentionsIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMentionComponent::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMentionComponent');
