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

class GoogleCloudOrgpolicyV2Policy extends \Google\Model
{
  protected $alternateType = GoogleCloudOrgpolicyV2AlternatePolicySpec::class;
  protected $alternateDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $specType = GoogleCloudOrgpolicyV2PolicySpec::class;
  protected $specDataType = '';

  /**
   * @param GoogleCloudOrgpolicyV2AlternatePolicySpec
   */
  public function setAlternate(GoogleCloudOrgpolicyV2AlternatePolicySpec $alternate)
  {
    $this->alternate = $alternate;
  }
  /**
   * @return GoogleCloudOrgpolicyV2AlternatePolicySpec
   */
  public function getAlternate()
  {
    return $this->alternate;
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
class_alias(GoogleCloudOrgpolicyV2Policy::class, 'Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2Policy');
