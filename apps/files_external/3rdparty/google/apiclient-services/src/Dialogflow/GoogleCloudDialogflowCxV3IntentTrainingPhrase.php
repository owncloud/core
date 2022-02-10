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

class GoogleCloudDialogflowCxV3IntentTrainingPhrase extends \Google\Collection
{
  protected $collection_key = 'parts';
  /**
   * @var string
   */
  public $id;
  protected $partsType = GoogleCloudDialogflowCxV3IntentTrainingPhrasePart::class;
  protected $partsDataType = 'array';
  /**
   * @var int
   */
  public $repeatCount;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param GoogleCloudDialogflowCxV3IntentTrainingPhrasePart[]
   */
  public function setParts($parts)
  {
    $this->parts = $parts;
  }
  /**
   * @return GoogleCloudDialogflowCxV3IntentTrainingPhrasePart[]
   */
  public function getParts()
  {
    return $this->parts;
  }
  /**
   * @param int
   */
  public function setRepeatCount($repeatCount)
  {
    $this->repeatCount = $repeatCount;
  }
  /**
   * @return int
   */
  public function getRepeatCount()
  {
    return $this->repeatCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3IntentTrainingPhrase::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentTrainingPhrase');
