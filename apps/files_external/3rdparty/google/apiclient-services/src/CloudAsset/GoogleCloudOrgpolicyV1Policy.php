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

namespace Google\Service\CloudAsset;

class GoogleCloudOrgpolicyV1Policy extends \Google\Model
{
  protected $booleanPolicyType = GoogleCloudOrgpolicyV1BooleanPolicy::class;
  protected $booleanPolicyDataType = '';
  public $constraint;
  public $etag;
  protected $listPolicyType = GoogleCloudOrgpolicyV1ListPolicy::class;
  protected $listPolicyDataType = '';
  protected $restoreDefaultType = GoogleCloudOrgpolicyV1RestoreDefault::class;
  protected $restoreDefaultDataType = '';
  public $updateTime;
  public $version;

  /**
   * @param GoogleCloudOrgpolicyV1BooleanPolicy
   */
  public function setBooleanPolicy(GoogleCloudOrgpolicyV1BooleanPolicy $booleanPolicy)
  {
    $this->booleanPolicy = $booleanPolicy;
  }
  /**
   * @return GoogleCloudOrgpolicyV1BooleanPolicy
   */
  public function getBooleanPolicy()
  {
    return $this->booleanPolicy;
  }
  public function setConstraint($constraint)
  {
    $this->constraint = $constraint;
  }
  public function getConstraint()
  {
    return $this->constraint;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param GoogleCloudOrgpolicyV1ListPolicy
   */
  public function setListPolicy(GoogleCloudOrgpolicyV1ListPolicy $listPolicy)
  {
    $this->listPolicy = $listPolicy;
  }
  /**
   * @return GoogleCloudOrgpolicyV1ListPolicy
   */
  public function getListPolicy()
  {
    return $this->listPolicy;
  }
  /**
   * @param GoogleCloudOrgpolicyV1RestoreDefault
   */
  public function setRestoreDefault(GoogleCloudOrgpolicyV1RestoreDefault $restoreDefault)
  {
    $this->restoreDefault = $restoreDefault;
  }
  /**
   * @return GoogleCloudOrgpolicyV1RestoreDefault
   */
  public function getRestoreDefault()
  {
    return $this->restoreDefault;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudOrgpolicyV1Policy::class, 'Google_Service_CloudAsset_GoogleCloudOrgpolicyV1Policy');
