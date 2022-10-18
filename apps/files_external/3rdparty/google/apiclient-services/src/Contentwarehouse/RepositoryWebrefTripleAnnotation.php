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

class RepositoryWebrefTripleAnnotation extends \Google\Collection
{
  protected $collection_key = 'predMid';
  /**
   * @var float
   */
  public $confidenceScore;
  /**
   * @var bool
   */
  public $isImplied;
  /**
   * @var bool
   */
  public $kgVerified;
  protected $mentionsType = RepositoryWebrefTripleMention::class;
  protected $mentionsDataType = 'array';
  /**
   * @var string[]
   */
  public $predMid;
  protected $stuffType = Proto2BridgeMessageSet::class;
  protected $stuffDataType = '';
  protected $tripleType = KnowledgeGraphTriple::class;
  protected $tripleDataType = '';

  /**
   * @param float
   */
  public function setConfidenceScore($confidenceScore)
  {
    $this->confidenceScore = $confidenceScore;
  }
  /**
   * @return float
   */
  public function getConfidenceScore()
  {
    return $this->confidenceScore;
  }
  /**
   * @param bool
   */
  public function setIsImplied($isImplied)
  {
    $this->isImplied = $isImplied;
  }
  /**
   * @return bool
   */
  public function getIsImplied()
  {
    return $this->isImplied;
  }
  /**
   * @param bool
   */
  public function setKgVerified($kgVerified)
  {
    $this->kgVerified = $kgVerified;
  }
  /**
   * @return bool
   */
  public function getKgVerified()
  {
    return $this->kgVerified;
  }
  /**
   * @param RepositoryWebrefTripleMention[]
   */
  public function setMentions($mentions)
  {
    $this->mentions = $mentions;
  }
  /**
   * @return RepositoryWebrefTripleMention[]
   */
  public function getMentions()
  {
    return $this->mentions;
  }
  /**
   * @param string[]
   */
  public function setPredMid($predMid)
  {
    $this->predMid = $predMid;
  }
  /**
   * @return string[]
   */
  public function getPredMid()
  {
    return $this->predMid;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setStuff(Proto2BridgeMessageSet $stuff)
  {
    $this->stuff = $stuff;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getStuff()
  {
    return $this->stuff;
  }
  /**
   * @param KnowledgeGraphTriple
   */
  public function setTriple(KnowledgeGraphTriple $triple)
  {
    $this->triple = $triple;
  }
  /**
   * @return KnowledgeGraphTriple
   */
  public function getTriple()
  {
    return $this->triple;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefTripleAnnotation::class, 'Google_Service_Contentwarehouse_RepositoryWebrefTripleAnnotation');
