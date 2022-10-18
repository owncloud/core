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

class GoogleCloudIntegrationsV1alphaCreateBundleRequest extends \Google\Collection
{
  protected $collection_key = 'integrations';
  /**
   * @var string
   */
  public $bundleId;
  /**
   * @var string[]
   */
  public $integrations;
  /**
   * @var string
   */
  public $secondaryCustomerOrgId;

  /**
   * @param string
   */
  public function setBundleId($bundleId)
  {
    $this->bundleId = $bundleId;
  }
  /**
   * @return string
   */
  public function getBundleId()
  {
    return $this->bundleId;
  }
  /**
   * @param string[]
   */
  public function setIntegrations($integrations)
  {
    $this->integrations = $integrations;
  }
  /**
   * @return string[]
   */
  public function getIntegrations()
  {
    return $this->integrations;
  }
  /**
   * @param string
   */
  public function setSecondaryCustomerOrgId($secondaryCustomerOrgId)
  {
    $this->secondaryCustomerOrgId = $secondaryCustomerOrgId;
  }
  /**
   * @return string
   */
  public function getSecondaryCustomerOrgId()
  {
    return $this->secondaryCustomerOrgId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaCreateBundleRequest::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaCreateBundleRequest');
