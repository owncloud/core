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

class Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1TraceSpan extends Google_Model
{
  protected $attributesType = 'Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1Attributes';
  protected $attributesDataType = '';
  public $childSpanCount;
  protected $displayNameType = 'Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1TruncatableString';
  protected $displayNameDataType = '';
  public $endTime;
  public $name;
  public $parentSpanId;
  public $sameProcessAsParentSpan;
  public $spanId;
  public $spanKind;
  public $startTime;
  protected $statusType = 'Google_Service_CertificateAuthorityService_Status';
  protected $statusDataType = '';

  /**
   * @param Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1Attributes
   */
  public function setAttributes(Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1Attributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setChildSpanCount($childSpanCount)
  {
    $this->childSpanCount = $childSpanCount;
  }
  public function getChildSpanCount()
  {
    return $this->childSpanCount;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1TruncatableString
   */
  public function setDisplayName(Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1TruncatableString $displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_GoogleApiServicecontrolV1TruncatableString
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParentSpanId($parentSpanId)
  {
    $this->parentSpanId = $parentSpanId;
  }
  public function getParentSpanId()
  {
    return $this->parentSpanId;
  }
  public function setSameProcessAsParentSpan($sameProcessAsParentSpan)
  {
    $this->sameProcessAsParentSpan = $sameProcessAsParentSpan;
  }
  public function getSameProcessAsParentSpan()
  {
    return $this->sameProcessAsParentSpan;
  }
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  public function getSpanId()
  {
    return $this->spanId;
  }
  public function setSpanKind($spanKind)
  {
    $this->spanKind = $spanKind;
  }
  public function getSpanKind()
  {
    return $this->spanKind;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_Status
   */
  public function setStatus(Google_Service_CertificateAuthorityService_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}
