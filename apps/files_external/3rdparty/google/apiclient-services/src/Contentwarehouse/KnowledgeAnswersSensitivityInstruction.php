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

class KnowledgeAnswersSensitivityInstruction extends \Google\Model
{
  protected $argumentType = KnowledgeAnswersSensitivityInstructionArgument::class;
  protected $argumentDataType = '';
  protected $intentType = KnowledgeAnswersSensitivityInstructionIntent::class;
  protected $intentDataType = '';
  protected $legacyAssistantSensitivityType = SearchPolicyRankableSensitivity::class;
  protected $legacyAssistantSensitivityDataType = '';
  /**
   * @var bool
   */
  public $multiAccountAllowed;
  protected $previousQueryType = KnowledgeAnswersSensitivityInstructionPreviousQuery::class;
  protected $previousQueryDataType = '';

  /**
   * @param KnowledgeAnswersSensitivityInstructionArgument
   */
  public function setArgument(KnowledgeAnswersSensitivityInstructionArgument $argument)
  {
    $this->argument = $argument;
  }
  /**
   * @return KnowledgeAnswersSensitivityInstructionArgument
   */
  public function getArgument()
  {
    return $this->argument;
  }
  /**
   * @param KnowledgeAnswersSensitivityInstructionIntent
   */
  public function setIntent(KnowledgeAnswersSensitivityInstructionIntent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return KnowledgeAnswersSensitivityInstructionIntent
   */
  public function getIntent()
  {
    return $this->intent;
  }
  /**
   * @param SearchPolicyRankableSensitivity
   */
  public function setLegacyAssistantSensitivity(SearchPolicyRankableSensitivity $legacyAssistantSensitivity)
  {
    $this->legacyAssistantSensitivity = $legacyAssistantSensitivity;
  }
  /**
   * @return SearchPolicyRankableSensitivity
   */
  public function getLegacyAssistantSensitivity()
  {
    return $this->legacyAssistantSensitivity;
  }
  /**
   * @param bool
   */
  public function setMultiAccountAllowed($multiAccountAllowed)
  {
    $this->multiAccountAllowed = $multiAccountAllowed;
  }
  /**
   * @return bool
   */
  public function getMultiAccountAllowed()
  {
    return $this->multiAccountAllowed;
  }
  /**
   * @param KnowledgeAnswersSensitivityInstructionPreviousQuery
   */
  public function setPreviousQuery(KnowledgeAnswersSensitivityInstructionPreviousQuery $previousQuery)
  {
    $this->previousQuery = $previousQuery;
  }
  /**
   * @return KnowledgeAnswersSensitivityInstructionPreviousQuery
   */
  public function getPreviousQuery()
  {
    return $this->previousQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersSensitivityInstruction::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersSensitivityInstruction');
