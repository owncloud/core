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

class GoogleCloudDialogflowV2beta1FaqAnswer extends \Google\Model
{
  public $answer;
  public $answerRecord;
  public $confidence;
  public $metadata;
  public $question;
  public $source;

  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }
  public function getAnswer()
  {
    return $this->answer;
  }
  public function setAnswerRecord($answerRecord)
  {
    $this->answerRecord = $answerRecord;
  }
  public function getAnswerRecord()
  {
    return $this->answerRecord;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setQuestion($question)
  {
    $this->question = $question;
  }
  public function getQuestion()
  {
    return $this->question;
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
class_alias(GoogleCloudDialogflowV2beta1FaqAnswer::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1FaqAnswer');
