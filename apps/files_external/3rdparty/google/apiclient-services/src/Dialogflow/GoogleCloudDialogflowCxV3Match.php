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

class GoogleCloudDialogflowCxV3Match extends \Google\Model
{
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $event;
  protected $intentType = GoogleCloudDialogflowCxV3Intent::class;
  protected $intentDataType = '';
  /**
   * @var string
   */
  public $matchType;
  /**
   * @var array[]
   */
  public $parameters;
  /**
   * @var string
   */
  public $resolvedInput;

  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setEvent($event)
  {
    $this->event = $event;
  }
  /**
   * @return string
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param GoogleCloudDialogflowCxV3Intent
   */
  public function setIntent(GoogleCloudDialogflowCxV3Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Intent
   */
  public function getIntent()
  {
    return $this->intent;
  }
  /**
   * @param string
   */
  public function setMatchType($matchType)
  {
    $this->matchType = $matchType;
  }
  /**
   * @return string
   */
  public function getMatchType()
  {
    return $this->matchType;
  }
  /**
   * @param array[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return array[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string
   */
  public function setResolvedInput($resolvedInput)
  {
    $this->resolvedInput = $resolvedInput;
  }
  /**
   * @return string
   */
  public function getResolvedInput()
  {
    return $this->resolvedInput;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Match::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match');
