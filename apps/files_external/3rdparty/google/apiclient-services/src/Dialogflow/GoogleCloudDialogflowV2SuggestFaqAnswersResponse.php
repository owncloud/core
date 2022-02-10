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

class GoogleCloudDialogflowV2SuggestFaqAnswersResponse extends \Google\Collection
{
  protected $collection_key = 'faqAnswers';
  /**
   * @var int
   */
  public $contextSize;
  protected $faqAnswersType = GoogleCloudDialogflowV2FaqAnswer::class;
  protected $faqAnswersDataType = 'array';
  /**
   * @var string
   */
  public $latestMessage;

  /**
   * @param int
   */
  public function setContextSize($contextSize)
  {
    $this->contextSize = $contextSize;
  }
  /**
   * @return int
   */
  public function getContextSize()
  {
    return $this->contextSize;
  }
  /**
   * @param GoogleCloudDialogflowV2FaqAnswer[]
   */
  public function setFaqAnswers($faqAnswers)
  {
    $this->faqAnswers = $faqAnswers;
  }
  /**
   * @return GoogleCloudDialogflowV2FaqAnswer[]
   */
  public function getFaqAnswers()
  {
    return $this->faqAnswers;
  }
  /**
   * @param string
   */
  public function setLatestMessage($latestMessage)
  {
    $this->latestMessage = $latestMessage;
  }
  /**
   * @return string
   */
  public function getLatestMessage()
  {
    return $this->latestMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2SuggestFaqAnswersResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2SuggestFaqAnswersResponse');
