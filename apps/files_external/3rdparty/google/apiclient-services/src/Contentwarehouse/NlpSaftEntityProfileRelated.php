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

class NlpSaftEntityProfileRelated extends \Google\Model
{
  /**
   * @var int
   */
  public $count;
  /**
   * @var bool
   */
  public $inverse;
  /**
   * @var int
   */
  public $relationId;
  protected $relationIdentifierType = NlpSaftIdentifier::class;
  protected $relationIdentifierDataType = '';
  /**
   * @var float
   */
  public $score;
  /**
   * @var string
   */
  public $targetId;
  protected $targetIdentifierType = NlpSaftIdentifier::class;
  protected $targetIdentifierDataType = '';
  /**
   * @var string
   */
  public $targetName;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param bool
   */
  public function setInverse($inverse)
  {
    $this->inverse = $inverse;
  }
  /**
   * @return bool
   */
  public function getInverse()
  {
    return $this->inverse;
  }
  /**
   * @param int
   */
  public function setRelationId($relationId)
  {
    $this->relationId = $relationId;
  }
  /**
   * @return int
   */
  public function getRelationId()
  {
    return $this->relationId;
  }
  /**
   * @param NlpSaftIdentifier
   */
  public function setRelationIdentifier(NlpSaftIdentifier $relationIdentifier)
  {
    $this->relationIdentifier = $relationIdentifier;
  }
  /**
   * @return NlpSaftIdentifier
   */
  public function getRelationIdentifier()
  {
    return $this->relationIdentifier;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  /**
   * @return string
   */
  public function getTargetId()
  {
    return $this->targetId;
  }
  /**
   * @param NlpSaftIdentifier
   */
  public function setTargetIdentifier(NlpSaftIdentifier $targetIdentifier)
  {
    $this->targetIdentifier = $targetIdentifier;
  }
  /**
   * @return NlpSaftIdentifier
   */
  public function getTargetIdentifier()
  {
    return $this->targetIdentifier;
  }
  /**
   * @param string
   */
  public function setTargetName($targetName)
  {
    $this->targetName = $targetName;
  }
  /**
   * @return string
   */
  public function getTargetName()
  {
    return $this->targetName;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftEntityProfileRelated::class, 'Google_Service_Contentwarehouse_NlpSaftEntityProfileRelated');
