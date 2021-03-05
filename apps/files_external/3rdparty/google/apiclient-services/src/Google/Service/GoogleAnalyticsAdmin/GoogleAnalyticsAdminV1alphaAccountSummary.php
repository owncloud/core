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

class Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAccountSummary extends Google_Collection
{
  protected $collection_key = 'propertySummaries';
  public $account;
  public $displayName;
  public $name;
  protected $propertySummariesType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaPropertySummary';
  protected $propertySummariesDataType = 'array';

  public function setAccount($account)
  {
    $this->account = $account;
  }
  public function getAccount()
  {
    return $this->account;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaPropertySummary[]
   */
  public function setPropertySummaries($propertySummaries)
  {
    $this->propertySummaries = $propertySummaries;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaPropertySummary[]
   */
  public function getPropertySummaries()
  {
    return $this->propertySummaries;
  }
}
