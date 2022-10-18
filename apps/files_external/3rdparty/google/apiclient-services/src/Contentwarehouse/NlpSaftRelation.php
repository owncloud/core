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

class NlpSaftRelation extends \Google\Collection
{
  protected $collection_key = 'mention';
  protected $identifierType = NlpSaftIdentifier::class;
  protected $identifierDataType = '';
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $mentionType = NlpSaftRelationMention::class;
  protected $mentionDataType = 'array';
  /**
   * @var float
   */
  public $score;
  /**
   * @var int
   */
  public $source;
  /**
   * @var int
   */
  public $target;
  /**
   * @var string
   */
  public $type;
  /**
   * @var int
   */
  public $typeId;

  /**
   * @param NlpSaftIdentifier
   */
  public function setIdentifier(NlpSaftIdentifier $identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return NlpSaftIdentifier
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
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
   * @param NlpSaftRelationMention[]
   */
  public function setMention($mention)
  {
    $this->mention = $mention;
  }
  /**
   * @return NlpSaftRelationMention[]
   */
  public function getMention()
  {
    return $this->mention;
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
   * @param int
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return int
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param int
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return int
   */
  public function getTarget()
  {
    return $this->target;
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
   * @param int
   */
  public function setTypeId($typeId)
  {
    $this->typeId = $typeId;
  }
  /**
   * @return int
   */
  public function getTypeId()
  {
    return $this->typeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftRelation::class, 'Google_Service_Contentwarehouse_NlpSaftRelation');
