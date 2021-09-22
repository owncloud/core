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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1FaqAnswerData extends \Google\Model
{
  public $answer;
  public $confidenceScore;
  public $metadata;
  public $queryRecord;
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
  public function setConfidenceScore($confidenceScore)
  {
    $this->confidenceScore = $confidenceScore;
  }
  public function getConfidenceScore()
  {
    return $this->confidenceScore;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setQueryRecord($queryRecord)
  {
    $this->queryRecord = $queryRecord;
  }
  public function getQueryRecord()
  {
    return $this->queryRecord;
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
class_alias(GoogleCloudContactcenterinsightsV1FaqAnswerData::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1FaqAnswerData');
