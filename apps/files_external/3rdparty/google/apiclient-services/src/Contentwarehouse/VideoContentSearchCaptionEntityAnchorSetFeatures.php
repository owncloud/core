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

class VideoContentSearchCaptionEntityAnchorSetFeatures extends \Google\Collection
{
  protected $collection_key = 'topHypernym';
  /**
   * @var float
   */
  public $aggregateScore;
  /**
   * @var int
   */
  public $clusterSize;
  /**
   * @var int
   */
  public $entitiesInWebrefEntities;
  /**
   * @var bool
   */
  public $entityMentionInDescriptionCount;
  /**
   * @var float
   */
  public $groupCohesion;
  /**
   * @var string
   */
  public $hypernym;
  /**
   * @var float
   */
  public $hypernymSalience;
  /**
   * @var int
   */
  public $medianMentions;
  /**
   * @var float
   */
  public $mentionSalience;
  /**
   * @var float
   */
  public $salience;
  /**
   * @var string[]
   */
  public $topHypernym;
  /**
   * @var int
   */
  public $totalMentions;

  /**
   * @param float
   */
  public function setAggregateScore($aggregateScore)
  {
    $this->aggregateScore = $aggregateScore;
  }
  /**
   * @return float
   */
  public function getAggregateScore()
  {
    return $this->aggregateScore;
  }
  /**
   * @param int
   */
  public function setClusterSize($clusterSize)
  {
    $this->clusterSize = $clusterSize;
  }
  /**
   * @return int
   */
  public function getClusterSize()
  {
    return $this->clusterSize;
  }
  /**
   * @param int
   */
  public function setEntitiesInWebrefEntities($entitiesInWebrefEntities)
  {
    $this->entitiesInWebrefEntities = $entitiesInWebrefEntities;
  }
  /**
   * @return int
   */
  public function getEntitiesInWebrefEntities()
  {
    return $this->entitiesInWebrefEntities;
  }
  /**
   * @param bool
   */
  public function setEntityMentionInDescriptionCount($entityMentionInDescriptionCount)
  {
    $this->entityMentionInDescriptionCount = $entityMentionInDescriptionCount;
  }
  /**
   * @return bool
   */
  public function getEntityMentionInDescriptionCount()
  {
    return $this->entityMentionInDescriptionCount;
  }
  /**
   * @param float
   */
  public function setGroupCohesion($groupCohesion)
  {
    $this->groupCohesion = $groupCohesion;
  }
  /**
   * @return float
   */
  public function getGroupCohesion()
  {
    return $this->groupCohesion;
  }
  /**
   * @param string
   */
  public function setHypernym($hypernym)
  {
    $this->hypernym = $hypernym;
  }
  /**
   * @return string
   */
  public function getHypernym()
  {
    return $this->hypernym;
  }
  /**
   * @param float
   */
  public function setHypernymSalience($hypernymSalience)
  {
    $this->hypernymSalience = $hypernymSalience;
  }
  /**
   * @return float
   */
  public function getHypernymSalience()
  {
    return $this->hypernymSalience;
  }
  /**
   * @param int
   */
  public function setMedianMentions($medianMentions)
  {
    $this->medianMentions = $medianMentions;
  }
  /**
   * @return int
   */
  public function getMedianMentions()
  {
    return $this->medianMentions;
  }
  /**
   * @param float
   */
  public function setMentionSalience($mentionSalience)
  {
    $this->mentionSalience = $mentionSalience;
  }
  /**
   * @return float
   */
  public function getMentionSalience()
  {
    return $this->mentionSalience;
  }
  /**
   * @param float
   */
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  /**
   * @return float
   */
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param string[]
   */
  public function setTopHypernym($topHypernym)
  {
    $this->topHypernym = $topHypernym;
  }
  /**
   * @return string[]
   */
  public function getTopHypernym()
  {
    return $this->topHypernym;
  }
  /**
   * @param int
   */
  public function setTotalMentions($totalMentions)
  {
    $this->totalMentions = $totalMentions;
  }
  /**
   * @return int
   */
  public function getTotalMentions()
  {
    return $this->totalMentions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCaptionEntityAnchorSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchCaptionEntityAnchorSetFeatures');
