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

namespace Google\Service\Fitness;

class AggregateBucket extends \Google\Collection
{
  protected $collection_key = 'dataset';
  /**
   * @var int
   */
  public $activity;
  protected $datasetType = Dataset::class;
  protected $datasetDataType = 'array';
  /**
   * @var string
   */
  public $endTimeMillis;
  protected $sessionType = Session::class;
  protected $sessionDataType = '';
  /**
   * @var string
   */
  public $startTimeMillis;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setActivity($activity)
  {
    $this->activity = $activity;
  }
  /**
   * @return int
   */
  public function getActivity()
  {
    return $this->activity;
  }
  /**
   * @param Dataset[]
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return Dataset[]
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param string
   */
  public function setEndTimeMillis($endTimeMillis)
  {
    $this->endTimeMillis = $endTimeMillis;
  }
  /**
   * @return string
   */
  public function getEndTimeMillis()
  {
    return $this->endTimeMillis;
  }
  /**
   * @param Session
   */
  public function setSession(Session $session)
  {
    $this->session = $session;
  }
  /**
   * @return Session
   */
  public function getSession()
  {
    return $this->session;
  }
  /**
   * @param string
   */
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  /**
   * @return string
   */
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AggregateBucket::class, 'Google_Service_Fitness_AggregateBucket');
