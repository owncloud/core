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

class KnowledgeGraphTriple extends \Google\Collection
{
  protected $collection_key = 'qualifierSets';
  /**
   * @var bool
   */
  public $isNegation;
  protected $objType = KnowledgeGraphTripleObj::class;
  protected $objDataType = '';
  /**
   * @var string
   */
  public $pred;
  protected $provenanceType = KnowledgeGraphTripleProvenance::class;
  protected $provenanceDataType = 'array';
  protected $qualifierSetsType = KnowledgeGraphQualifierSet::class;
  protected $qualifierSetsDataType = 'array';
  /**
   * @var string
   */
  public $sub;

  /**
   * @param bool
   */
  public function setIsNegation($isNegation)
  {
    $this->isNegation = $isNegation;
  }
  /**
   * @return bool
   */
  public function getIsNegation()
  {
    return $this->isNegation;
  }
  /**
   * @param KnowledgeGraphTripleObj
   */
  public function setObj(KnowledgeGraphTripleObj $obj)
  {
    $this->obj = $obj;
  }
  /**
   * @return KnowledgeGraphTripleObj
   */
  public function getObj()
  {
    return $this->obj;
  }
  /**
   * @param string
   */
  public function setPred($pred)
  {
    $this->pred = $pred;
  }
  /**
   * @return string
   */
  public function getPred()
  {
    return $this->pred;
  }
  /**
   * @param KnowledgeGraphTripleProvenance[]
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return KnowledgeGraphTripleProvenance[]
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param KnowledgeGraphQualifierSet[]
   */
  public function setQualifierSets($qualifierSets)
  {
    $this->qualifierSets = $qualifierSets;
  }
  /**
   * @return KnowledgeGraphQualifierSet[]
   */
  public function getQualifierSets()
  {
    return $this->qualifierSets;
  }
  /**
   * @param string
   */
  public function setSub($sub)
  {
    $this->sub = $sub;
  }
  /**
   * @return string
   */
  public function getSub()
  {
    return $this->sub;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeGraphTriple::class, 'Google_Service_Contentwarehouse_KnowledgeGraphTriple');
