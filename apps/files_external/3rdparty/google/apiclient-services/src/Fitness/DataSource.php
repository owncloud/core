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

class DataSource extends \Google\Collection
{
  protected $collection_key = 'dataQualityStandard';
  protected $applicationType = Application::class;
  protected $applicationDataType = '';
  /**
   * @var string[]
   */
  public $dataQualityStandard;
  /**
   * @var string
   */
  public $dataStreamId;
  /**
   * @var string
   */
  public $dataStreamName;
  protected $dataTypeType = DataType::class;
  protected $dataTypeDataType = '';
  protected $deviceType = Device::class;
  protected $deviceDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $type;

  /**
   * @param Application
   */
  public function setApplication(Application $application)
  {
    $this->application = $application;
  }
  /**
   * @return Application
   */
  public function getApplication()
  {
    return $this->application;
  }
  /**
   * @param string[]
   */
  public function setDataQualityStandard($dataQualityStandard)
  {
    $this->dataQualityStandard = $dataQualityStandard;
  }
  /**
   * @return string[]
   */
  public function getDataQualityStandard()
  {
    return $this->dataQualityStandard;
  }
  /**
   * @param string
   */
  public function setDataStreamId($dataStreamId)
  {
    $this->dataStreamId = $dataStreamId;
  }
  /**
   * @return string
   */
  public function getDataStreamId()
  {
    return $this->dataStreamId;
  }
  /**
   * @param string
   */
  public function setDataStreamName($dataStreamName)
  {
    $this->dataStreamName = $dataStreamName;
  }
  /**
   * @return string
   */
  public function getDataStreamName()
  {
    return $this->dataStreamName;
  }
  /**
   * @param DataType
   */
  public function setDataType(DataType $dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return DataType
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param Device
   */
  public function setDevice(Device $device)
  {
    $this->device = $device;
  }
  /**
   * @return Device
   */
  public function getDevice()
  {
    return $this->device;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
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
class_alias(DataSource::class, 'Google_Service_Fitness_DataSource');
