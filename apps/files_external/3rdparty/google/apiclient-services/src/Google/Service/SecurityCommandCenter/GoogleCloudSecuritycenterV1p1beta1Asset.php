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

class Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Asset extends Google_Model
{
  public $createTime;
  protected $iamPolicyType = 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1IamPolicy';
  protected $iamPolicyDataType = '';
  public $name;
  public $resourceProperties;
  protected $securityCenterPropertiesType = 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityCenterProperties';
  protected $securityCenterPropertiesDataType = '';
  protected $securityMarksType = 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityMarks';
  protected $securityMarksDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1IamPolicy
   */
  public function setIamPolicy(Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1IamPolicy $iamPolicy)
  {
    $this->iamPolicy = $iamPolicy;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1IamPolicy
   */
  public function getIamPolicy()
  {
    return $this->iamPolicy;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResourceProperties($resourceProperties)
  {
    $this->resourceProperties = $resourceProperties;
  }
  public function getResourceProperties()
  {
    return $this->resourceProperties;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityCenterProperties
   */
  public function setSecurityCenterProperties(Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityCenterProperties $securityCenterProperties)
  {
    $this->securityCenterProperties = $securityCenterProperties;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityCenterProperties
   */
  public function getSecurityCenterProperties()
  {
    return $this->securityCenterProperties;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityMarks
   */
  public function setSecurityMarks(Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityMarks $securityMarks)
  {
    $this->securityMarks = $securityMarks;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1SecurityMarks
   */
  public function getSecurityMarks()
  {
    return $this->securityMarks;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
