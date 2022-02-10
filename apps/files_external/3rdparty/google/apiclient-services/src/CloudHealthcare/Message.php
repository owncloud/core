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

namespace Google\Service\CloudHealthcare;

class Message extends \Google\Collection
{
  protected $collection_key = 'patientIds';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $data;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $messageType;
  /**
   * @var string
   */
  public $name;
  protected $parsedDataType = ParsedData::class;
  protected $parsedDataDataType = '';
  protected $patientIdsType = PatientId::class;
  protected $patientIdsDataType = 'array';
  protected $schematizedDataType = SchematizedData::class;
  protected $schematizedDataDataType = '';
  /**
   * @var string
   */
  public $sendFacility;
  /**
   * @var string
   */
  public $sendTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setMessageType($messageType)
  {
    $this->messageType = $messageType;
  }
  /**
   * @return string
   */
  public function getMessageType()
  {
    return $this->messageType;
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
   * @param ParsedData
   */
  public function setParsedData(ParsedData $parsedData)
  {
    $this->parsedData = $parsedData;
  }
  /**
   * @return ParsedData
   */
  public function getParsedData()
  {
    return $this->parsedData;
  }
  /**
   * @param PatientId[]
   */
  public function setPatientIds($patientIds)
  {
    $this->patientIds = $patientIds;
  }
  /**
   * @return PatientId[]
   */
  public function getPatientIds()
  {
    return $this->patientIds;
  }
  /**
   * @param SchematizedData
   */
  public function setSchematizedData(SchematizedData $schematizedData)
  {
    $this->schematizedData = $schematizedData;
  }
  /**
   * @return SchematizedData
   */
  public function getSchematizedData()
  {
    return $this->schematizedData;
  }
  /**
   * @param string
   */
  public function setSendFacility($sendFacility)
  {
    $this->sendFacility = $sendFacility;
  }
  /**
   * @return string
   */
  public function getSendFacility()
  {
    return $this->sendFacility;
  }
  /**
   * @param string
   */
  public function setSendTime($sendTime)
  {
    $this->sendTime = $sendTime;
  }
  /**
   * @return string
   */
  public function getSendTime()
  {
    return $this->sendTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Message::class, 'Google_Service_CloudHealthcare_Message');
