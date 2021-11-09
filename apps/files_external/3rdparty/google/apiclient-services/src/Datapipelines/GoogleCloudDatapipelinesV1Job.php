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

namespace Google\Service\Datapipelines;

class GoogleCloudDatapipelinesV1Job extends \Google\Model
{
  public $createTime;
  protected $dataflowJobDetailsType = GoogleCloudDatapipelinesV1DataflowJobDetails::class;
  protected $dataflowJobDetailsDataType = '';
  public $endTime;
  public $id;
  public $name;
  public $state;
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudDatapipelinesV1DataflowJobDetails
   */
  public function setDataflowJobDetails(GoogleCloudDatapipelinesV1DataflowJobDetails $dataflowJobDetails)
  {
    $this->dataflowJobDetails = $dataflowJobDetails;
  }
  /**
   * @return GoogleCloudDatapipelinesV1DataflowJobDetails
   */
  public function getDataflowJobDetails()
  {
    return $this->dataflowJobDetails;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setStatus(GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1Job::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1Job');
