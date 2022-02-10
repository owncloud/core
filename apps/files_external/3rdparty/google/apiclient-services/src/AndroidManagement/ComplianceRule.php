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

namespace Google\Service\AndroidManagement;

class ComplianceRule extends \Google\Collection
{
  protected $collection_key = 'packageNamesToDisable';
  protected $apiLevelConditionType = ApiLevelCondition::class;
  protected $apiLevelConditionDataType = '';
  /**
   * @var bool
   */
  public $disableApps;
  protected $nonComplianceDetailConditionType = NonComplianceDetailCondition::class;
  protected $nonComplianceDetailConditionDataType = '';
  /**
   * @var string[]
   */
  public $packageNamesToDisable;

  /**
   * @param ApiLevelCondition
   */
  public function setApiLevelCondition(ApiLevelCondition $apiLevelCondition)
  {
    $this->apiLevelCondition = $apiLevelCondition;
  }
  /**
   * @return ApiLevelCondition
   */
  public function getApiLevelCondition()
  {
    return $this->apiLevelCondition;
  }
  /**
   * @param bool
   */
  public function setDisableApps($disableApps)
  {
    $this->disableApps = $disableApps;
  }
  /**
   * @return bool
   */
  public function getDisableApps()
  {
    return $this->disableApps;
  }
  /**
   * @param NonComplianceDetailCondition
   */
  public function setNonComplianceDetailCondition(NonComplianceDetailCondition $nonComplianceDetailCondition)
  {
    $this->nonComplianceDetailCondition = $nonComplianceDetailCondition;
  }
  /**
   * @return NonComplianceDetailCondition
   */
  public function getNonComplianceDetailCondition()
  {
    return $this->nonComplianceDetailCondition;
  }
  /**
   * @param string[]
   */
  public function setPackageNamesToDisable($packageNamesToDisable)
  {
    $this->packageNamesToDisable = $packageNamesToDisable;
  }
  /**
   * @return string[]
   */
  public function getPackageNamesToDisable()
  {
    return $this->packageNamesToDisable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ComplianceRule::class, 'Google_Service_AndroidManagement_ComplianceRule');
