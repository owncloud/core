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

namespace Google\Service\ToolResults;

class MultiStep extends \Google\Model
{
  /**
   * @var int
   */
  public $multistepNumber;
  protected $primaryStepType = PrimaryStep::class;
  protected $primaryStepDataType = '';
  /**
   * @var string
   */
  public $primaryStepId;

  /**
   * @param int
   */
  public function setMultistepNumber($multistepNumber)
  {
    $this->multistepNumber = $multistepNumber;
  }
  /**
   * @return int
   */
  public function getMultistepNumber()
  {
    return $this->multistepNumber;
  }
  /**
   * @param PrimaryStep
   */
  public function setPrimaryStep(PrimaryStep $primaryStep)
  {
    $this->primaryStep = $primaryStep;
  }
  /**
   * @return PrimaryStep
   */
  public function getPrimaryStep()
  {
    return $this->primaryStep;
  }
  /**
   * @param string
   */
  public function setPrimaryStepId($primaryStepId)
  {
    $this->primaryStepId = $primaryStepId;
  }
  /**
   * @return string
   */
  public function getPrimaryStepId()
  {
    return $this->primaryStepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MultiStep::class, 'Google_Service_ToolResults_MultiStep');
