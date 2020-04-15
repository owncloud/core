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

class Google_Service_DLP_GooglePrivacyDlpV2RecordKey extends Google_Collection
{
  protected $collection_key = 'idValues';
  protected $bigQueryKeyType = 'Google_Service_DLP_GooglePrivacyDlpV2BigQueryKey';
  protected $bigQueryKeyDataType = '';
  protected $datastoreKeyType = 'Google_Service_DLP_GooglePrivacyDlpV2DatastoreKey';
  protected $datastoreKeyDataType = '';
  public $idValues;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2BigQueryKey
   */
  public function setBigQueryKey(Google_Service_DLP_GooglePrivacyDlpV2BigQueryKey $bigQueryKey)
  {
    $this->bigQueryKey = $bigQueryKey;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2BigQueryKey
   */
  public function getBigQueryKey()
  {
    return $this->bigQueryKey;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2DatastoreKey
   */
  public function setDatastoreKey(Google_Service_DLP_GooglePrivacyDlpV2DatastoreKey $datastoreKey)
  {
    $this->datastoreKey = $datastoreKey;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2DatastoreKey
   */
  public function getDatastoreKey()
  {
    return $this->datastoreKey;
  }
  public function setIdValues($idValues)
  {
    $this->idValues = $idValues;
  }
  public function getIdValues()
  {
    return $this->idValues;
  }
}
