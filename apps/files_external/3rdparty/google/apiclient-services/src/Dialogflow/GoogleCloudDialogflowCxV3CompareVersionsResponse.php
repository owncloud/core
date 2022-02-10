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

class GoogleCloudDialogflowCxV3CompareVersionsResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $baseVersionContentJson;
  /**
   * @var string
   */
  public $compareTime;
  /**
   * @var string
   */
  public $targetVersionContentJson;

  /**
   * @param string
   */
  public function setBaseVersionContentJson($baseVersionContentJson)
  {
    $this->baseVersionContentJson = $baseVersionContentJson;
  }
  /**
   * @return string
   */
  public function getBaseVersionContentJson()
  {
    return $this->baseVersionContentJson;
  }
  /**
   * @param string
   */
  public function setCompareTime($compareTime)
  {
    $this->compareTime = $compareTime;
  }
  /**
   * @return string
   */
  public function getCompareTime()
  {
    return $this->compareTime;
  }
  /**
   * @param string
   */
  public function setTargetVersionContentJson($targetVersionContentJson)
  {
    $this->targetVersionContentJson = $targetVersionContentJson;
  }
  /**
   * @return string
   */
  public function getTargetVersionContentJson()
  {
    return $this->targetVersionContentJson;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3CompareVersionsResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3CompareVersionsResponse');
