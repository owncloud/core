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

class GoogleCloudContactcenterinsightsV1DialogflowInteractionData extends \Google\Model
{
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $dialogflowIntentId;

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
  public function setDialogflowIntentId($dialogflowIntentId)
  {
    $this->dialogflowIntentId = $dialogflowIntentId;
  }
  /**
   * @return string
   */
  public function getDialogflowIntentId()
  {
    return $this->dialogflowIntentId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1DialogflowInteractionData::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1DialogflowInteractionData');
