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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData extends \Google\Collection
{
  protected $collection_key = 'managementChain';
  protected $adminToType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $adminToDataType = 'array';
  protected $adminsType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $adminsDataType = 'array';
  protected $dottedLineManagersType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $dottedLineManagersDataType = 'array';
  protected $dottedLineReportsType = AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber::class;
  protected $dottedLineReportsDataType = '';
  /**
   * @var string[]
   */
  public $failures;
  protected $managementChainType = AppsPeopleOzExternalMergedpeopleapiPerson::class;
  protected $managementChainDataType = 'array';
  protected $reportsType = AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber::class;
  protected $reportsDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setAdminTo($adminTo)
  {
    $this->adminTo = $adminTo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getAdminTo()
  {
    return $this->adminTo;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setAdmins($admins)
  {
    $this->admins = $admins;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getAdmins()
  {
    return $this->admins;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setDottedLineManagers($dottedLineManagers)
  {
    $this->dottedLineManagers = $dottedLineManagers;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getDottedLineManagers()
  {
    return $this->dottedLineManagers;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber
   */
  public function setDottedLineReports(AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber $dottedLineReports)
  {
    $this->dottedLineReports = $dottedLineReports;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber
   */
  public function getDottedLineReports()
  {
    return $this->dottedLineReports;
  }
  /**
   * @param string[]
   */
  public function setFailures($failures)
  {
    $this->failures = $failures;
  }
  /**
   * @return string[]
   */
  public function getFailures()
  {
    return $this->failures;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function setManagementChain($managementChain)
  {
    $this->managementChain = $managementChain;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPerson[]
   */
  public function getManagementChain()
  {
    return $this->managementChain;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber
   */
  public function setReports(AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber $reports)
  {
    $this->reports = $reports;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonListWithTotalNumber
   */
  public function getReports()
  {
    return $this->reports;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiTeamsExtendedData');
