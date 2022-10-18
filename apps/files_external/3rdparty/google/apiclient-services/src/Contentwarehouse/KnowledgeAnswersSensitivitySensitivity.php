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

class KnowledgeAnswersSensitivitySensitivity extends \Google\Collection
{
  protected $collection_key = 'source';
  protected $accountProvenanceType = QualityQrewriteAccountProvenance::class;
  protected $accountProvenanceDataType = 'array';
  protected $instructionType = KnowledgeAnswersSensitivityInstruction::class;
  protected $instructionDataType = '';
  /**
   * @var string[]
   */
  public $source;
  /**
   * @var string
   */
  public $type;

  /**
   * @param QualityQrewriteAccountProvenance[]
   */
  public function setAccountProvenance($accountProvenance)
  {
    $this->accountProvenance = $accountProvenance;
  }
  /**
   * @return QualityQrewriteAccountProvenance[]
   */
  public function getAccountProvenance()
  {
    return $this->accountProvenance;
  }
  /**
   * @param KnowledgeAnswersSensitivityInstruction
   */
  public function setInstruction(KnowledgeAnswersSensitivityInstruction $instruction)
  {
    $this->instruction = $instruction;
  }
  /**
   * @return KnowledgeAnswersSensitivityInstruction
   */
  public function getInstruction()
  {
    return $this->instruction;
  }
  /**
   * @param string[]
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string[]
   */
  public function getSource()
  {
    return $this->source;
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
class_alias(KnowledgeAnswersSensitivitySensitivity::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersSensitivitySensitivity');
