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

class KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskState extends \Google\Collection
{
  protected $collection_key = 'currentQueryEvalData';
  /**
   * @var string[]
   */
  public $argumentName;
  protected $currentQueryEvalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $currentQueryEvalDataDataType = 'array';
  /**
   * @var string
   */
  public $dialogIntentStateId;
  /**
   * @var string
   */
  public $intentName;
  protected $listCandidateType = KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStateListCandidate::class;
  protected $listCandidateDataType = '';
  protected $previousFunctionCallType = KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStatePreviousFunctionCall::class;
  protected $previousFunctionCallDataType = '';

  /**
   * @param string[]
   */
  public function setArgumentName($argumentName)
  {
    $this->argumentName = $argumentName;
  }
  /**
   * @return string[]
   */
  public function getArgumentName()
  {
    return $this->argumentName;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData[]
   */
  public function setCurrentQueryEvalData($currentQueryEvalData)
  {
    $this->currentQueryEvalData = $currentQueryEvalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData[]
   */
  public function getCurrentQueryEvalData()
  {
    return $this->currentQueryEvalData;
  }
  /**
   * @param string
   */
  public function setDialogIntentStateId($dialogIntentStateId)
  {
    $this->dialogIntentStateId = $dialogIntentStateId;
  }
  /**
   * @return string
   */
  public function getDialogIntentStateId()
  {
    return $this->dialogIntentStateId;
  }
  /**
   * @param string
   */
  public function setIntentName($intentName)
  {
    $this->intentName = $intentName;
  }
  /**
   * @return string
   */
  public function getIntentName()
  {
    return $this->intentName;
  }
  /**
   * @param KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStateListCandidate
   */
  public function setListCandidate(KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStateListCandidate $listCandidate)
  {
    $this->listCandidate = $listCandidate;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStateListCandidate
   */
  public function getListCandidate()
  {
    return $this->listCandidate;
  }
  /**
   * @param KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStatePreviousFunctionCall
   */
  public function setPreviousFunctionCall(KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStatePreviousFunctionCall $previousFunctionCall)
  {
    $this->previousFunctionCall = $previousFunctionCall;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskStatePreviousFunctionCall
   */
  public function getPreviousFunctionCall()
  {
    return $this->previousFunctionCall;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskState::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgumentProvenancePreviousTaskState');
