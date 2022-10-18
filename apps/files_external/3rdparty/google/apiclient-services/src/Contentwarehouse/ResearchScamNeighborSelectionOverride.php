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

class ResearchScamNeighborSelectionOverride extends \Google\Model
{
  /**
   * @var float
   */
  public $approxEpsilonDistance;
  /**
   * @var int
   */
  public $approxNumNeighbors;
  /**
   * @var float
   */
  public $epsilonDistance;
  /**
   * @var int
   */
  public $numNeighbors;
  /**
   * @var int
   */
  public $numSingleShardNeighbors;
  /**
   * @var int
   */
  public $perCrowdingAttributeNumNeighbors;
  /**
   * @var int
   */
  public $perCrowdingAttributePreReorderingNumNeighbors;
  /**
   * @var int
   */
  public $treeXHybridLeavesSearchedOverride;

  /**
   * @param float
   */
  public function setApproxEpsilonDistance($approxEpsilonDistance)
  {
    $this->approxEpsilonDistance = $approxEpsilonDistance;
  }
  /**
   * @return float
   */
  public function getApproxEpsilonDistance()
  {
    return $this->approxEpsilonDistance;
  }
  /**
   * @param int
   */
  public function setApproxNumNeighbors($approxNumNeighbors)
  {
    $this->approxNumNeighbors = $approxNumNeighbors;
  }
  /**
   * @return int
   */
  public function getApproxNumNeighbors()
  {
    return $this->approxNumNeighbors;
  }
  /**
   * @param float
   */
  public function setEpsilonDistance($epsilonDistance)
  {
    $this->epsilonDistance = $epsilonDistance;
  }
  /**
   * @return float
   */
  public function getEpsilonDistance()
  {
    return $this->epsilonDistance;
  }
  /**
   * @param int
   */
  public function setNumNeighbors($numNeighbors)
  {
    $this->numNeighbors = $numNeighbors;
  }
  /**
   * @return int
   */
  public function getNumNeighbors()
  {
    return $this->numNeighbors;
  }
  /**
   * @param int
   */
  public function setNumSingleShardNeighbors($numSingleShardNeighbors)
  {
    $this->numSingleShardNeighbors = $numSingleShardNeighbors;
  }
  /**
   * @return int
   */
  public function getNumSingleShardNeighbors()
  {
    return $this->numSingleShardNeighbors;
  }
  /**
   * @param int
   */
  public function setPerCrowdingAttributeNumNeighbors($perCrowdingAttributeNumNeighbors)
  {
    $this->perCrowdingAttributeNumNeighbors = $perCrowdingAttributeNumNeighbors;
  }
  /**
   * @return int
   */
  public function getPerCrowdingAttributeNumNeighbors()
  {
    return $this->perCrowdingAttributeNumNeighbors;
  }
  /**
   * @param int
   */
  public function setPerCrowdingAttributePreReorderingNumNeighbors($perCrowdingAttributePreReorderingNumNeighbors)
  {
    $this->perCrowdingAttributePreReorderingNumNeighbors = $perCrowdingAttributePreReorderingNumNeighbors;
  }
  /**
   * @return int
   */
  public function getPerCrowdingAttributePreReorderingNumNeighbors()
  {
    return $this->perCrowdingAttributePreReorderingNumNeighbors;
  }
  /**
   * @param int
   */
  public function setTreeXHybridLeavesSearchedOverride($treeXHybridLeavesSearchedOverride)
  {
    $this->treeXHybridLeavesSearchedOverride = $treeXHybridLeavesSearchedOverride;
  }
  /**
   * @return int
   */
  public function getTreeXHybridLeavesSearchedOverride()
  {
    return $this->treeXHybridLeavesSearchedOverride;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamNeighborSelectionOverride::class, 'Google_Service_Contentwarehouse_ResearchScamNeighborSelectionOverride');
