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

class NlpSaftSemanticNode extends \Google\Collection
{
  protected $collection_key = 'arc';
  protected $arcType = NlpSaftSemanticNodeArc::class;
  protected $arcDataType = 'array';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $description;
  /**
   * @var int
   */
  public $entity;
  /**
   * @var bool
   */
  public $implicit;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $measure;
  /**
   * @var int
   */
  public $mention;
  protected $phraseType = NlpSaftPhrase::class;
  protected $phraseDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param NlpSaftSemanticNodeArc[]
   */
  public function setArc($arc)
  {
    $this->arc = $arc;
  }
  /**
   * @return NlpSaftSemanticNodeArc[]
   */
  public function getArc()
  {
    return $this->arc;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param int
   */
  public function setEntity($entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return int
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param bool
   */
  public function setImplicit($implicit)
  {
    $this->implicit = $implicit;
  }
  /**
   * @return bool
   */
  public function getImplicit()
  {
    return $this->implicit;
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
   * @param int
   */
  public function setMeasure($measure)
  {
    $this->measure = $measure;
  }
  /**
   * @return int
   */
  public function getMeasure()
  {
    return $this->measure;
  }
  /**
   * @param int
   */
  public function setMention($mention)
  {
    $this->mention = $mention;
  }
  /**
   * @return int
   */
  public function getMention()
  {
    return $this->mention;
  }
  /**
   * @param NlpSaftPhrase
   */
  public function setPhrase(NlpSaftPhrase $phrase)
  {
    $this->phrase = $phrase;
  }
  /**
   * @return NlpSaftPhrase
   */
  public function getPhrase()
  {
    return $this->phrase;
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
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftSemanticNode::class, 'Google_Service_Contentwarehouse_NlpSaftSemanticNode');
