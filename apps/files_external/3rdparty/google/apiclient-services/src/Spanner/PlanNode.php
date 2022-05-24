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

namespace Google\Service\Spanner;

class PlanNode extends \Google\Collection
{
  protected $collection_key = 'childLinks';
  protected $childLinksType = ChildLink::class;
  protected $childLinksDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var array[]
   */
  public $executionStats;
  /**
   * @var int
   */
  public $index;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var array[]
   */
  public $metadata;
  protected $shortRepresentationType = ShortRepresentation::class;
  protected $shortRepresentationDataType = '';

  /**
   * @param ChildLink[]
   */
  public function setChildLinks($childLinks)
  {
    $this->childLinks = $childLinks;
  }
  /**
   * @return ChildLink[]
   */
  public function getChildLinks()
  {
    return $this->childLinks;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param array[]
   */
  public function setExecutionStats($executionStats)
  {
    $this->executionStats = $executionStats;
  }
  /**
   * @return array[]
   */
  public function getExecutionStats()
  {
    return $this->executionStats;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param array[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return array[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param ShortRepresentation
   */
  public function setShortRepresentation(ShortRepresentation $shortRepresentation)
  {
    $this->shortRepresentation = $shortRepresentation;
  }
  /**
   * @return ShortRepresentation
   */
  public function getShortRepresentation()
  {
    return $this->shortRepresentation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlanNode::class, 'Google_Service_Spanner_PlanNode');
