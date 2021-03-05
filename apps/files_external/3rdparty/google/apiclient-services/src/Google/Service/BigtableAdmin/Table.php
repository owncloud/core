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

class Google_Service_BigtableAdmin_Table extends Google_Model
{
  protected $clusterStatesType = 'Google_Service_BigtableAdmin_ClusterState';
  protected $clusterStatesDataType = 'map';
  protected $columnFamiliesType = 'Google_Service_BigtableAdmin_ColumnFamily';
  protected $columnFamiliesDataType = 'map';
  public $granularity;
  public $name;
  protected $restoreInfoType = 'Google_Service_BigtableAdmin_RestoreInfo';
  protected $restoreInfoDataType = '';

  /**
   * @param Google_Service_BigtableAdmin_ClusterState[]
   */
  public function setClusterStates($clusterStates)
  {
    $this->clusterStates = $clusterStates;
  }
  /**
   * @return Google_Service_BigtableAdmin_ClusterState[]
   */
  public function getClusterStates()
  {
    return $this->clusterStates;
  }
  /**
   * @param Google_Service_BigtableAdmin_ColumnFamily[]
   */
  public function setColumnFamilies($columnFamilies)
  {
    $this->columnFamilies = $columnFamilies;
  }
  /**
   * @return Google_Service_BigtableAdmin_ColumnFamily[]
   */
  public function getColumnFamilies()
  {
    return $this->columnFamilies;
  }
  public function setGranularity($granularity)
  {
    $this->granularity = $granularity;
  }
  public function getGranularity()
  {
    return $this->granularity;
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
   * @param Google_Service_BigtableAdmin_RestoreInfo
   */
  public function setRestoreInfo(Google_Service_BigtableAdmin_RestoreInfo $restoreInfo)
  {
    $this->restoreInfo = $restoreInfo;
  }
  /**
   * @return Google_Service_BigtableAdmin_RestoreInfo
   */
  public function getRestoreInfo()
  {
    return $this->restoreInfo;
  }
}
