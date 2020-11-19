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

class Google_Service_Bigquery_GlobalExplanation extends Google_Collection
{
  protected $collection_key = 'explanations';
  public $classLabel;
  protected $explanationsType = 'Google_Service_Bigquery_Explanation';
  protected $explanationsDataType = 'array';

  public function setClassLabel($classLabel)
  {
    $this->classLabel = $classLabel;
  }
  public function getClassLabel()
  {
    return $this->classLabel;
  }
  /**
   * @param Google_Service_Bigquery_Explanation
   */
  public function setExplanations($explanations)
  {
    $this->explanations = $explanations;
  }
  /**
   * @return Google_Service_Bigquery_Explanation
   */
  public function getExplanations()
  {
    return $this->explanations;
  }
}
