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

namespace Google\Service\BigQueryDataTransfer;

class DataSource extends \Google\Collection
{
  protected $collection_key = 'scopes';
  /**
   * @var string
   */
  public $authorizationType;
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $dataRefreshType;
  /**
   * @var string
   */
  public $dataSourceId;
  /**
   * @var int
   */
  public $defaultDataRefreshWindowDays;
  /**
   * @var string
   */
  public $defaultSchedule;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $helpUrl;
  /**
   * @var bool
   */
  public $manualRunsDisabled;
  /**
   * @var string
   */
  public $minimumScheduleInterval;
  /**
   * @var string
   */
  public $name;
  protected $parametersType = DataSourceParameter::class;
  protected $parametersDataType = 'array';
  /**
   * @var string[]
   */
  public $scopes;
  /**
   * @var bool
   */
  public $supportsCustomSchedule;
  /**
   * @var bool
   */
  public $supportsMultipleTransfers;
  /**
   * @var string
   */
  public $transferType;
  /**
   * @var int
   */
  public $updateDeadlineSeconds;

  /**
   * @param string
   */
  public function setAuthorizationType($authorizationType)
  {
    $this->authorizationType = $authorizationType;
  }
  /**
   * @return string
   */
  public function getAuthorizationType()
  {
    return $this->authorizationType;
  }
  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setDataRefreshType($dataRefreshType)
  {
    $this->dataRefreshType = $dataRefreshType;
  }
  /**
   * @return string
   */
  public function getDataRefreshType()
  {
    return $this->dataRefreshType;
  }
  /**
   * @param string
   */
  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  /**
   * @return string
   */
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  /**
   * @param int
   */
  public function setDefaultDataRefreshWindowDays($defaultDataRefreshWindowDays)
  {
    $this->defaultDataRefreshWindowDays = $defaultDataRefreshWindowDays;
  }
  /**
   * @return int
   */
  public function getDefaultDataRefreshWindowDays()
  {
    return $this->defaultDataRefreshWindowDays;
  }
  /**
   * @param string
   */
  public function setDefaultSchedule($defaultSchedule)
  {
    $this->defaultSchedule = $defaultSchedule;
  }
  /**
   * @return string
   */
  public function getDefaultSchedule()
  {
    return $this->defaultSchedule;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setHelpUrl($helpUrl)
  {
    $this->helpUrl = $helpUrl;
  }
  /**
   * @return string
   */
  public function getHelpUrl()
  {
    return $this->helpUrl;
  }
  /**
   * @param bool
   */
  public function setManualRunsDisabled($manualRunsDisabled)
  {
    $this->manualRunsDisabled = $manualRunsDisabled;
  }
  /**
   * @return bool
   */
  public function getManualRunsDisabled()
  {
    return $this->manualRunsDisabled;
  }
  /**
   * @param string
   */
  public function setMinimumScheduleInterval($minimumScheduleInterval)
  {
    $this->minimumScheduleInterval = $minimumScheduleInterval;
  }
  /**
   * @return string
   */
  public function getMinimumScheduleInterval()
  {
    return $this->minimumScheduleInterval;
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
   * @param DataSourceParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return DataSourceParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string[]
   */
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  /**
   * @return string[]
   */
  public function getScopes()
  {
    return $this->scopes;
  }
  /**
   * @param bool
   */
  public function setSupportsCustomSchedule($supportsCustomSchedule)
  {
    $this->supportsCustomSchedule = $supportsCustomSchedule;
  }
  /**
   * @return bool
   */
  public function getSupportsCustomSchedule()
  {
    return $this->supportsCustomSchedule;
  }
  /**
   * @param bool
   */
  public function setSupportsMultipleTransfers($supportsMultipleTransfers)
  {
    $this->supportsMultipleTransfers = $supportsMultipleTransfers;
  }
  /**
   * @return bool
   */
  public function getSupportsMultipleTransfers()
  {
    return $this->supportsMultipleTransfers;
  }
  /**
   * @param string
   */
  public function setTransferType($transferType)
  {
    $this->transferType = $transferType;
  }
  /**
   * @return string
   */
  public function getTransferType()
  {
    return $this->transferType;
  }
  /**
   * @param int
   */
  public function setUpdateDeadlineSeconds($updateDeadlineSeconds)
  {
    $this->updateDeadlineSeconds = $updateDeadlineSeconds;
  }
  /**
   * @return int
   */
  public function getUpdateDeadlineSeconds()
  {
    return $this->updateDeadlineSeconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSource::class, 'Google_Service_BigQueryDataTransfer_DataSource');
