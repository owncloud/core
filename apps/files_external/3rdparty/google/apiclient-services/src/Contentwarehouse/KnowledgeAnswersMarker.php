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

class KnowledgeAnswersMarker extends \Google\Model
{
  protected $commandType = KnowledgeAnswersMarkerCommand::class;
  protected $commandDataType = '';
  protected $openQuestionType = KnowledgeAnswersMarkerOpenQuestion::class;
  protected $openQuestionDataType = '';
  protected $polarQuestionType = KnowledgeAnswersMarkerPolarQuestion::class;
  protected $polarQuestionDataType = '';
  protected $stateOfAffairsType = KnowledgeAnswersMarkerStateOfAffairs::class;
  protected $stateOfAffairsDataType = '';

  /**
   * @param KnowledgeAnswersMarkerCommand
   */
  public function setCommand(KnowledgeAnswersMarkerCommand $command)
  {
    $this->command = $command;
  }
  /**
   * @return KnowledgeAnswersMarkerCommand
   */
  public function getCommand()
  {
    return $this->command;
  }
  /**
   * @param KnowledgeAnswersMarkerOpenQuestion
   */
  public function setOpenQuestion(KnowledgeAnswersMarkerOpenQuestion $openQuestion)
  {
    $this->openQuestion = $openQuestion;
  }
  /**
   * @return KnowledgeAnswersMarkerOpenQuestion
   */
  public function getOpenQuestion()
  {
    return $this->openQuestion;
  }
  /**
   * @param KnowledgeAnswersMarkerPolarQuestion
   */
  public function setPolarQuestion(KnowledgeAnswersMarkerPolarQuestion $polarQuestion)
  {
    $this->polarQuestion = $polarQuestion;
  }
  /**
   * @return KnowledgeAnswersMarkerPolarQuestion
   */
  public function getPolarQuestion()
  {
    return $this->polarQuestion;
  }
  /**
   * @param KnowledgeAnswersMarkerStateOfAffairs
   */
  public function setStateOfAffairs(KnowledgeAnswersMarkerStateOfAffairs $stateOfAffairs)
  {
    $this->stateOfAffairs = $stateOfAffairs;
  }
  /**
   * @return KnowledgeAnswersMarkerStateOfAffairs
   */
  public function getStateOfAffairs()
  {
    return $this->stateOfAffairs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersMarker::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersMarker');
