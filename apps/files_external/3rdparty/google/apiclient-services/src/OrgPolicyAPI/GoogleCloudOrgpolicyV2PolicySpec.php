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

namespace Google\Service\OrgPolicyAPI;

class GoogleCloudOrgpolicyV2PolicySpec extends \Google\Collection
{
  protected $collection_key = 'rules';
  public $etag;
  public $inheritFromParent;
  public $reset;
  protected $rulesType = GoogleCloudOrgpolicyV2PolicySpecPolicyRule::class;
  protected $rulesDataType = 'array';
  public $updateTime;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setInheritFromParent($inheritFromParent)
  {
    $this->inheritFromParent = $inheritFromParent;
  }
  public function getInheritFromParent()
  {
    return $this->inheritFromParent;
  }
  public function setReset($reset)
  {
    $this->reset = $reset;
  }
  public function getReset()
  {
    return $this->reset;
  }
  /**
   * @param GoogleCloudOrgpolicyV2PolicySpecPolicyRule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return GoogleCloudOrgpolicyV2PolicySpecPolicyRule[]
   */
  public function getRules()
  {
    return $this->rules;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudOrgpolicyV2PolicySpec::class, 'Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2PolicySpec');
