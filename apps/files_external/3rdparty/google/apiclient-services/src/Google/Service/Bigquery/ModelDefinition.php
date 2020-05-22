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

class Google_Service_Bigquery_ModelDefinition extends Google_Collection
{
  protected $collection_key = 'trainingRuns';
  protected $modelOptionsType = 'Google_Service_Bigquery_ModelDefinitionModelOptions';
  protected $modelOptionsDataType = '';
  protected $trainingRunsType = 'Google_Service_Bigquery_BqmlTrainingRun';
  protected $trainingRunsDataType = 'array';

  /**
   * @param Google_Service_Bigquery_ModelDefinitionModelOptions
   */
  public function setModelOptions(Google_Service_Bigquery_ModelDefinitionModelOptions $modelOptions)
  {
    $this->modelOptions = $modelOptions;
  }
  /**
   * @return Google_Service_Bigquery_ModelDefinitionModelOptions
   */
  public function getModelOptions()
  {
    return $this->modelOptions;
  }
  /**
   * @param Google_Service_Bigquery_BqmlTrainingRun
   */
  public function setTrainingRuns($trainingRuns)
  {
    $this->trainingRuns = $trainingRuns;
  }
  /**
   * @return Google_Service_Bigquery_BqmlTrainingRun
   */
  public function getTrainingRuns()
  {
    return $this->trainingRuns;
  }
}
