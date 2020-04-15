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

class Google_Service_CloudHealthcare_Message extends Google_Collection
{
  protected $collection_key = 'patientIds';
  public $createTime;
  public $data;
  public $labels;
  public $messageType;
  public $name;
  protected $parsedDataType = 'Google_Service_CloudHealthcare_ParsedData';
  protected $parsedDataDataType = '';
  protected $patientIdsType = 'Google_Service_CloudHealthcare_PatientId';
  protected $patientIdsDataType = 'array';
  public $sendFacility;
  public $sendTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMessageType($messageType)
  {
    $this->messageType = $messageType;
  }
  public function getMessageType()
  {
    return $this->messageType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudHealthcare_ParsedData
   */
  public function setParsedData(Google_Service_CloudHealthcare_ParsedData $parsedData)
  {
    $this->parsedData = $parsedData;
  }
  /**
   * @return Google_Service_CloudHealthcare_ParsedData
   */
  public function getParsedData()
  {
    return $this->parsedData;
  }
  /**
   * @param Google_Service_CloudHealthcare_PatientId
   */
  public function setPatientIds($patientIds)
  {
    $this->patientIds = $patientIds;
  }
  /**
   * @return Google_Service_CloudHealthcare_PatientId
   */
  public function getPatientIds()
  {
    return $this->patientIds;
  }
  public function setSendFacility($sendFacility)
  {
    $this->sendFacility = $sendFacility;
  }
  public function getSendFacility()
  {
    return $this->sendFacility;
  }
  public function setSendTime($sendTime)
  {
    $this->sendTime = $sendTime;
  }
  public function getSendTime()
  {
    return $this->sendTime;
  }
}
