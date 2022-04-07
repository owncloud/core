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

class Grade extends \Google\Model
{
  /**
   * @var bool
   */
  public $correct;
  protected $feedbackType = Feedback::class;
  protected $feedbackDataType = '';
  public $score;

  /**
   * @param bool
   */
  public function setCorrect($correct)
  {
    $this->correct = $correct;
  }
  /**
   * @return bool
   */
  public function getCorrect()
  {
    return $this->correct;
  }
  /**
   * @param Feedback
   */
  public function setFeedback(Feedback $feedback)
  {
    $this->feedback = $feedback;
  }
  /**
   * @return Feedback
   */
  public function getFeedback()
  {
    return $this->feedback;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Grade::class, 'Google_Service_Forms_Grade');
