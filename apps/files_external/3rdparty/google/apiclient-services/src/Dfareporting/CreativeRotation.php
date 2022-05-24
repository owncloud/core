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

namespace Google\Service\Dfareporting;

class CreativeRotation extends \Google\Collection
{
  protected $collection_key = 'creativeAssignments';
  protected $creativeAssignmentsType = CreativeAssignment::class;
  protected $creativeAssignmentsDataType = 'array';
  /**
   * @var string
   */
  public $creativeOptimizationConfigurationId;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $weightCalculationStrategy;

  /**
   * @param CreativeAssignment[]
   */
  public function setCreativeAssignments($creativeAssignments)
  {
    $this->creativeAssignments = $creativeAssignments;
  }
  /**
   * @return CreativeAssignment[]
   */
  public function getCreativeAssignments()
  {
    return $this->creativeAssignments;
  }
  /**
   * @param string
   */
  public function setCreativeOptimizationConfigurationId($creativeOptimizationConfigurationId)
  {
    $this->creativeOptimizationConfigurationId = $creativeOptimizationConfigurationId;
  }
  /**
   * @return string
   */
  public function getCreativeOptimizationConfigurationId()
  {
    return $this->creativeOptimizationConfigurationId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setWeightCalculationStrategy($weightCalculationStrategy)
  {
    $this->weightCalculationStrategy = $weightCalculationStrategy;
  }
  /**
   * @return string
   */
  public function getWeightCalculationStrategy()
  {
    return $this->weightCalculationStrategy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeRotation::class, 'Google_Service_Dfareporting_CreativeRotation');
