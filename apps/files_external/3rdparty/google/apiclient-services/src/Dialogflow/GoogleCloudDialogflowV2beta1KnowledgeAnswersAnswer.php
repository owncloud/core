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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1KnowledgeAnswersAnswer extends \Google\Model
{
  /**
   * @var string
   */
  public $answer;
  /**
   * @var string
   */
  public $faqQuestion;
  /**
   * @var float
   */
  public $matchConfidence;
  /**
   * @var string
   */
  public $matchConfidenceLevel;
  /**
   * @var string
   */
  public $source;

  /**
   * @param string
   */
  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }
  /**
   * @return string
   */
  public function getAnswer()
  {
    return $this->answer;
  }
  /**
   * @param string
   */
  public function setFaqQuestion($faqQuestion)
  {
    $this->faqQuestion = $faqQuestion;
  }
  /**
   * @return string
   */
  public function getFaqQuestion()
  {
    return $this->faqQuestion;
  }
  /**
   * @param float
   */
  public function setMatchConfidence($matchConfidence)
  {
    $this->matchConfidence = $matchConfidence;
  }
  /**
   * @return float
   */
  public function getMatchConfidence()
  {
    return $this->matchConfidence;
  }
  /**
   * @param string
   */
  public function setMatchConfidenceLevel($matchConfidenceLevel)
  {
    $this->matchConfidenceLevel = $matchConfidenceLevel;
  }
  /**
   * @return string
   */
  public function getMatchConfidenceLevel()
  {
    return $this->matchConfidenceLevel;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1KnowledgeAnswersAnswer::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1KnowledgeAnswersAnswer');
