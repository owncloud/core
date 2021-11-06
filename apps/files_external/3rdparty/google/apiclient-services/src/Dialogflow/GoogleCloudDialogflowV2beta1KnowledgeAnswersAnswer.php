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
  public $answer;
  public $faqQuestion;
  public $matchConfidence;
  public $matchConfidenceLevel;
  public $source;

  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }
  public function getAnswer()
  {
    return $this->answer;
  }
  public function setFaqQuestion($faqQuestion)
  {
    $this->faqQuestion = $faqQuestion;
  }
  public function getFaqQuestion()
  {
    return $this->faqQuestion;
  }
  public function setMatchConfidence($matchConfidence)
  {
    $this->matchConfidence = $matchConfidence;
  }
  public function getMatchConfidence()
  {
    return $this->matchConfidence;
  }
  public function setMatchConfidenceLevel($matchConfidenceLevel)
  {
    $this->matchConfidenceLevel = $matchConfidenceLevel;
  }
  public function getMatchConfidenceLevel()
  {
    return $this->matchConfidenceLevel;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1KnowledgeAnswersAnswer::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1KnowledgeAnswersAnswer');
