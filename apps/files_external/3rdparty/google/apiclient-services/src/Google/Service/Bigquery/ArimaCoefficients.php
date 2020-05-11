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

class Google_Service_Bigquery_ArimaCoefficients extends Google_Collection
{
  protected $collection_key = 'movingAverageCoefficients';
  public $autoRegressiveCoefficients;
  public $interceptCoefficient;
  public $movingAverageCoefficients;

  public function setAutoRegressiveCoefficients($autoRegressiveCoefficients)
  {
    $this->autoRegressiveCoefficients = $autoRegressiveCoefficients;
  }
  public function getAutoRegressiveCoefficients()
  {
    return $this->autoRegressiveCoefficients;
  }
  public function setInterceptCoefficient($interceptCoefficient)
  {
    $this->interceptCoefficient = $interceptCoefficient;
  }
  public function getInterceptCoefficient()
  {
    return $this->interceptCoefficient;
  }
  public function setMovingAverageCoefficients($movingAverageCoefficients)
  {
    $this->movingAverageCoefficients = $movingAverageCoefficients;
  }
  public function getMovingAverageCoefficients()
  {
    return $this->movingAverageCoefficients;
  }
}
