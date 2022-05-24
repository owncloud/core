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

class Answer extends \Google\Model
{
  protected $fileUploadAnswersType = FileUploadAnswers::class;
  protected $fileUploadAnswersDataType = '';
  protected $gradeType = Grade::class;
  protected $gradeDataType = '';
  /**
   * @var string
   */
  public $questionId;
  protected $textAnswersType = TextAnswers::class;
  protected $textAnswersDataType = '';

  /**
   * @param FileUploadAnswers
   */
  public function setFileUploadAnswers(FileUploadAnswers $fileUploadAnswers)
  {
    $this->fileUploadAnswers = $fileUploadAnswers;
  }
  /**
   * @return FileUploadAnswers
   */
  public function getFileUploadAnswers()
  {
    return $this->fileUploadAnswers;
  }
  /**
   * @param Grade
   */
  public function setGrade(Grade $grade)
  {
    $this->grade = $grade;
  }
  /**
   * @return Grade
   */
  public function getGrade()
  {
    return $this->grade;
  }
  /**
   * @param string
   */
  public function setQuestionId($questionId)
  {
    $this->questionId = $questionId;
  }
  /**
   * @return string
   */
  public function getQuestionId()
  {
    return $this->questionId;
  }
  /**
   * @param TextAnswers
   */
  public function setTextAnswers(TextAnswers $textAnswers)
  {
    $this->textAnswers = $textAnswers;
  }
  /**
   * @return TextAnswers
   */
  public function getTextAnswers()
  {
    return $this->textAnswers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Answer::class, 'Google_Service_Forms_Answer');
