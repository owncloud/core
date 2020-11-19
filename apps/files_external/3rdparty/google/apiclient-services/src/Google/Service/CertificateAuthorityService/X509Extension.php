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

class Google_Service_CertificateAuthorityService_X509Extension extends Google_Model
{
  public $critical;
  protected $objectIdType = 'Google_Service_CertificateAuthorityService_ObjectId';
  protected $objectIdDataType = '';
  public $value;

  public function setCritical($critical)
  {
    $this->critical = $critical;
  }
  public function getCritical()
  {
    return $this->critical;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ObjectId
   */
  public function setObjectId(Google_Service_CertificateAuthorityService_ObjectId $objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ObjectId
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
