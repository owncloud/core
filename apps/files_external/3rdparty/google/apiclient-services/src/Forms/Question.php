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

class Question extends \Google\Model
{
  protected $choiceQuestionType = ChoiceQuestion::class;
  protected $choiceQuestionDataType = '';
  protected $dateQuestionType = DateQuestion::class;
  protected $dateQuestionDataType = '';
  protected $fileUploadQuestionType = FileUploadQuestion::class;
  protected $fileUploadQuestionDataType = '';
  protected $gradingType = Grading::class;
  protected $gradingDataType = '';
  /**
   * @var string
   */
  public $questionId;
  /**
   * @var bool
   */
  public $required;
  protected $rowQuestionType = RowQuestion::class;
  protected $rowQuestionDataType = '';
  protected $scaleQuestionType = ScaleQuestion::class;
  protected $scaleQuestionDataType = '';
  protected $textQuestionType = TextQuestion::class;
  protected $textQuestionDataType = '';
  protected $timeQuestionType = TimeQuestion::class;
  protected $timeQuestionDataType = '';

  /**
   * @param ChoiceQuestion
   */
  public function setChoiceQuestion(ChoiceQuestion $choiceQuestion)
  {
    $this->choiceQuestion = $choiceQuestion;
  }
  /**
   * @return ChoiceQuestion
   */
  public function getChoiceQuestion()
  {
    return $this->choiceQuestion;
  }
  /**
   * @param DateQuestion
   */
  public function setDateQuestion(DateQuestion $dateQuestion)
  {
    $this->dateQuestion = $dateQuestion;
  }
  /**
   * @return DateQuestion
   */
  public function getDateQuestion()
  {
    return $this->dateQuestion;
  }
  /**
   * @param FileUploadQuestion
   */
  public function setFileUploadQuestion(FileUploadQuestion $fileUploadQuestion)
  {
    $this->fileUploadQuestion = $fileUploadQuestion;
  }
  /**
   * @return FileUploadQuestion
   */
  public function getFileUploadQuestion()
  {
    return $this->fileUploadQuestion;
  }
  /**
   * @param Grading
   */
  public function setGrading(Grading $grading)
  {
    $this->grading = $grading;
  }
  /**
   * @return Grading
   */
  public function getGrading()
  {
    return $this->grading;
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
   * @param bool
   */
  public function setRequired($required)
  {
    $this->required = $required;
  }
  /**
   * @return bool
   */
  public function getRequired()
  {
    return $this->required;
  }
  /**
   * @param RowQuestion
   */
  public function setRowQuestion(RowQuestion $rowQuestion)
  {
    $this->rowQuestion = $rowQuestion;
  }
  /**
   * @return RowQuestion
   */
  public function getRowQuestion()
  {
    return $this->rowQuestion;
  }
  /**
   * @param ScaleQuestion
   */
  public function setScaleQuestion(ScaleQuestion $scaleQuestion)
  {
    $this->scaleQuestion = $scaleQuestion;
  }
  /**
   * @return ScaleQuestion
   */
  public function getScaleQuestion()
  {
    return $this->scaleQuestion;
  }
  /**
   * @param TextQuestion
   */
  public function setTextQuestion(TextQuestion $textQuestion)
  {
    $this->textQuestion = $textQuestion;
  }
  /**
   * @return TextQuestion
   */
  public function getTextQuestion()
  {
    return $this->textQuestion;
  }
  /**
   * @param TimeQuestion
   */
  public function setTimeQuestion(TimeQuestion $timeQuestion)
  {
    $this->timeQuestion = $timeQuestion;
  }
  /**
   * @return TimeQuestion
   */
  public function getTimeQuestion()
  {
    return $this->timeQuestion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Question::class, 'Google_Service_Forms_Question');
