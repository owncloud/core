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

class RepositoryWebrefClusterProtoRelationRule extends \Google\Model
{
  /**
   * @var bool
   */
  public $isCollapsible;
  /**
   * @var bool
   */
  public $isCvtRule;
  /**
   * @var string
   */
  public $relation;
  /**
   * @var int
   */
  public $sequenceId;

  /**
   * @param bool
   */
  public function setIsCollapsible($isCollapsible)
  {
    $this->isCollapsible = $isCollapsible;
  }
  /**
   * @return bool
   */
  public function getIsCollapsible()
  {
    return $this->isCollapsible;
  }
  /**
   * @param bool
   */
  public function setIsCvtRule($isCvtRule)
  {
    $this->isCvtRule = $isCvtRule;
  }
  /**
   * @return bool
   */
  public function getIsCvtRule()
  {
    return $this->isCvtRule;
  }
  /**
   * @param string
   */
  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  /**
   * @return string
   */
  public function getRelation()
  {
    return $this->relation;
  }
  /**
   * @param int
   */
  public function setSequenceId($sequenceId)
  {
    $this->sequenceId = $sequenceId;
  }
  /**
   * @return int
   */
  public function getSequenceId()
  {
    return $this->sequenceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefClusterProtoRelationRule::class, 'Google_Service_Contentwarehouse_RepositoryWebrefClusterProtoRelationRule');
