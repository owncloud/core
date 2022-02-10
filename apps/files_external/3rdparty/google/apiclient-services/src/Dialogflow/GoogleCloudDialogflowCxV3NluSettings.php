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

class GoogleCloudDialogflowCxV3NluSettings extends \Google\Model
{
  /**
   * @var float
   */
  public $classificationThreshold;
  /**
   * @var string
   */
  public $modelTrainingMode;
  /**
   * @var string
   */
  public $modelType;

  /**
   * @param float
   */
  public function setClassificationThreshold($classificationThreshold)
  {
    $this->classificationThreshold = $classificationThreshold;
  }
  /**
   * @return float
   */
  public function getClassificationThreshold()
  {
    return $this->classificationThreshold;
  }
  /**
   * @param string
   */
  public function setModelTrainingMode($modelTrainingMode)
  {
    $this->modelTrainingMode = $modelTrainingMode;
  }
  /**
   * @return string
   */
  public function getModelTrainingMode()
  {
    return $this->modelTrainingMode;
  }
  /**
   * @param string
   */
  public function setModelType($modelType)
  {
    $this->modelType = $modelType;
  }
  /**
   * @return string
   */
  public function getModelType()
  {
    return $this->modelType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3NluSettings::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3NluSettings');
