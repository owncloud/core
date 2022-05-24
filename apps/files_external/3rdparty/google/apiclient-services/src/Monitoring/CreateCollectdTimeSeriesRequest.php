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

namespace Google\Service\Monitoring;

class CreateCollectdTimeSeriesRequest extends \Google\Collection
{
  protected $collection_key = 'collectdPayloads';
  protected $collectdPayloadsType = CollectdPayload::class;
  protected $collectdPayloadsDataType = 'array';
  /**
   * @var string
   */
  public $collectdVersion;
  protected $resourceType = MonitoredResource::class;
  protected $resourceDataType = '';

  /**
   * @param CollectdPayload[]
   */
  public function setCollectdPayloads($collectdPayloads)
  {
    $this->collectdPayloads = $collectdPayloads;
  }
  /**
   * @return CollectdPayload[]
   */
  public function getCollectdPayloads()
  {
    return $this->collectdPayloads;
  }
  /**
   * @param string
   */
  public function setCollectdVersion($collectdVersion)
  {
    $this->collectdVersion = $collectdVersion;
  }
  /**
   * @return string
   */
  public function getCollectdVersion()
  {
    return $this->collectdVersion;
  }
  /**
   * @param MonitoredResource
   */
  public function setResource(MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return MonitoredResource
   */
  public function getResource()
  {
    return $this->resource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateCollectdTimeSeriesRequest::class, 'Google_Service_Monitoring_CreateCollectdTimeSeriesRequest');
