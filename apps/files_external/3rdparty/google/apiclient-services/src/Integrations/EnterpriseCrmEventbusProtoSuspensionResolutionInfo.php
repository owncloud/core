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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoSuspensionResolutionInfo extends \Google\Model
{
  protected $auditType = EnterpriseCrmEventbusProtoSuspensionResolutionInfoAudit::class;
  protected $auditDataType = '';
  /**
   * @var string
   */
  public $createdTimestamp;
  /**
   * @var string
   */
  public $eventExecutionInfoId;
  protected $externalTrafficType = EnterpriseCrmEventbusProtoExternalTraffic::class;
  protected $externalTrafficDataType = '';
  /**
   * @var string
   */
  public $lastModifiedTimestamp;
  /**
   * @var string
   */
  public $product;
  /**
   * @var string
   */
  public $status;
  protected $suspensionConfigType = EnterpriseCrmEventbusProtoSuspensionConfig::class;
  protected $suspensionConfigDataType = '';
  /**
   * @var string
   */
  public $suspensionId;
  /**
   * @var string
   */
  public $taskNumber;
  /**
   * @var string
   */
  public $workflowName;

  /**
   * @param EnterpriseCrmEventbusProtoSuspensionResolutionInfoAudit
   */
  public function setAudit(EnterpriseCrmEventbusProtoSuspensionResolutionInfoAudit $audit)
  {
    $this->audit = $audit;
  }
  /**
   * @return EnterpriseCrmEventbusProtoSuspensionResolutionInfoAudit
   */
  public function getAudit()
  {
    return $this->audit;
  }
  /**
   * @param string
   */
  public function setCreatedTimestamp($createdTimestamp)
  {
    $this->createdTimestamp = $createdTimestamp;
  }
  /**
   * @return string
   */
  public function getCreatedTimestamp()
  {
    return $this->createdTimestamp;
  }
  /**
   * @param string
   */
  public function setEventExecutionInfoId($eventExecutionInfoId)
  {
    $this->eventExecutionInfoId = $eventExecutionInfoId;
  }
  /**
   * @return string
   */
  public function getEventExecutionInfoId()
  {
    return $this->eventExecutionInfoId;
  }
  /**
   * @param EnterpriseCrmEventbusProtoExternalTraffic
   */
  public function setExternalTraffic(EnterpriseCrmEventbusProtoExternalTraffic $externalTraffic)
  {
    $this->externalTraffic = $externalTraffic;
  }
  /**
   * @return EnterpriseCrmEventbusProtoExternalTraffic
   */
  public function getExternalTraffic()
  {
    return $this->externalTraffic;
  }
  /**
   * @param string
   */
  public function setLastModifiedTimestamp($lastModifiedTimestamp)
  {
    $this->lastModifiedTimestamp = $lastModifiedTimestamp;
  }
  /**
   * @return string
   */
  public function getLastModifiedTimestamp()
  {
    return $this->lastModifiedTimestamp;
  }
  /**
   * @param string
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return string
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param EnterpriseCrmEventbusProtoSuspensionConfig
   */
  public function setSuspensionConfig(EnterpriseCrmEventbusProtoSuspensionConfig $suspensionConfig)
  {
    $this->suspensionConfig = $suspensionConfig;
  }
  /**
   * @return EnterpriseCrmEventbusProtoSuspensionConfig
   */
  public function getSuspensionConfig()
  {
    return $this->suspensionConfig;
  }
  /**
   * @param string
   */
  public function setSuspensionId($suspensionId)
  {
    $this->suspensionId = $suspensionId;
  }
  /**
   * @return string
   */
  public function getSuspensionId()
  {
    return $this->suspensionId;
  }
  /**
   * @param string
   */
  public function setTaskNumber($taskNumber)
  {
    $this->taskNumber = $taskNumber;
  }
  /**
   * @return string
   */
  public function getTaskNumber()
  {
    return $this->taskNumber;
  }
  /**
   * @param string
   */
  public function setWorkflowName($workflowName)
  {
    $this->workflowName = $workflowName;
  }
  /**
   * @return string
   */
  public function getWorkflowName()
  {
    return $this->workflowName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoSuspensionResolutionInfo::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoSuspensionResolutionInfo');
