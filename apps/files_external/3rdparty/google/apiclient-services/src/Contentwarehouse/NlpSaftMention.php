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

class NlpSaftMention extends \Google\Model
{
  public $confidence;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $nestingRelation;
  protected $phraseType = NlpSaftPhrase::class;
  protected $phraseDataType = '';
  protected $resolutionType = NlpSaftMentionResolution::class;
  protected $resolutionDataType = '';
  /**
   * @var string
   */
  public $role;
  /**
   * @var string
   */
  public $type;

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
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
   * @param string
   */
  public function setNestingRelation($nestingRelation)
  {
    $this->nestingRelation = $nestingRelation;
  }
  /**
   * @return string
   */
  public function getNestingRelation()
  {
    return $this->nestingRelation;
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
   * @param NlpSaftMentionResolution
   */
  public function setResolution(NlpSaftMentionResolution $resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return NlpSaftMentionResolution
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
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
class_alias(NlpSaftMention::class, 'Google_Service_Contentwarehouse_NlpSaftMention');
