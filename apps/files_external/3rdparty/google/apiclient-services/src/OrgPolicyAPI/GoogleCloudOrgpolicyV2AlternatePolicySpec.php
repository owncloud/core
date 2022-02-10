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

class GoogleCloudOrgpolicyV2AlternatePolicySpec extends \Google\Model
{
  /**
   * @var string
   */
  public $launch;
  protected $specType = GoogleCloudOrgpolicyV2PolicySpec::class;
  protected $specDataType = '';

  /**
   * @param string
   */
  public function setLaunch($launch)
  {
    $this->launch = $launch;
  }
  /**
   * @return string
   */
  public function getLaunch()
  {
    return $this->launch;
  }
  /**
   * @param GoogleCloudOrgpolicyV2PolicySpec
   */
  public function setSpec(GoogleCloudOrgpolicyV2PolicySpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return GoogleCloudOrgpolicyV2PolicySpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudOrgpolicyV2AlternatePolicySpec::class, 'Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2AlternatePolicySpec');
