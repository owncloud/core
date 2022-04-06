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

namespace Google\Service\Forms;

class FormResponse extends \Google\Model
{
  protected $answersType = Answer::class;
  protected $answersDataType = 'map';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $formId;
  /**
   * @var string
   */
  public $lastSubmittedTime;
  /**
   * @var string
   */
  public $respondentEmail;
  /**
   * @var string
   */
  public $responseId;
  public $totalScore;

  /**
   * @param Answer[]
   */
  public function setAnswers($answers)
  {
    $this->answers = $answers;
  }
  /**
   * @return Answer[]
   */
  public function getAnswers()
  {
    return $this->answers;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setFormId($formId)
  {
    $this->formId = $formId;
  }
  /**
   * @return string
   */
  public function getFormId()
  {
    return $this->formId;
  }
  /**
   * @param string
   */
  public function setLastSubmittedTime($lastSubmittedTime)
  {
    $this->lastSubmittedTime = $lastSubmittedTime;
  }
  /**
   * @return string
   */
  public function getLastSubmittedTime()
  {
    return $this->lastSubmittedTime;
  }
  /**
   * @param string
   */
  public function setRespondentEmail($respondentEmail)
  {
    $this->respondentEmail = $respondentEmail;
  }
  /**
   * @return string
   */
  public function getRespondentEmail()
  {
    return $this->respondentEmail;
  }
  /**
   * @param string
   */
  public function setResponseId($responseId)
  {
    $this->responseId = $responseId;
  }
  /**
   * @return string
   */
  public function getResponseId()
  {
    return $this->responseId;
  }
  public function setTotalScore($totalScore)
  {
    $this->totalScore = $totalScore;
  }
  public function getTotalScore()
  {
    return $this->totalScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FormResponse::class, 'Google_Service_Forms_FormResponse');
