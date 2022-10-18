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

class TrawlerClientServiceInfo extends \Google\Collection
{
  protected $collection_key = 'clientLabels';
  protected $internal_gapi_mappings = [
        "delegatedProjectName" => "DelegatedProjectName",
        "serviceClientID" => "ServiceClientID",
  ];
  /**
   * @var string
   */
  public $delegatedProjectName;
  /**
   * @var string
   */
  public $serviceClientID;
  protected $clientLabelsType = TrawlerClientServiceInfoClientLabels::class;
  protected $clientLabelsDataType = 'array';

  /**
   * @param string
   */
  public function setDelegatedProjectName($delegatedProjectName)
  {
    $this->delegatedProjectName = $delegatedProjectName;
  }
  /**
   * @return string
   */
  public function getDelegatedProjectName()
  {
    return $this->delegatedProjectName;
  }
  /**
   * @param string
   */
  public function setServiceClientID($serviceClientID)
  {
    $this->serviceClientID = $serviceClientID;
  }
  /**
   * @return string
   */
  public function getServiceClientID()
  {
    return $this->serviceClientID;
  }
  /**
   * @param TrawlerClientServiceInfoClientLabels[]
   */
  public function setClientLabels($clientLabels)
  {
    $this->clientLabels = $clientLabels;
  }
  /**
   * @return TrawlerClientServiceInfoClientLabels[]
   */
  public function getClientLabels()
  {
    return $this->clientLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerClientServiceInfo::class, 'Google_Service_Contentwarehouse_TrawlerClientServiceInfo');
