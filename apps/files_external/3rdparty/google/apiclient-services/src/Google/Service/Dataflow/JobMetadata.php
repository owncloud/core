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

class Google_Service_Dataflow_JobMetadata extends Google_Collection
{
  protected $collection_key = 'spannerDetails';
  protected $bigTableDetailsType = 'Google_Service_Dataflow_BigTableIODetails';
  protected $bigTableDetailsDataType = 'array';
  protected $bigqueryDetailsType = 'Google_Service_Dataflow_BigQueryIODetails';
  protected $bigqueryDetailsDataType = 'array';
  protected $datastoreDetailsType = 'Google_Service_Dataflow_DatastoreIODetails';
  protected $datastoreDetailsDataType = 'array';
  protected $fileDetailsType = 'Google_Service_Dataflow_FileIODetails';
  protected $fileDetailsDataType = 'array';
  protected $pubsubDetailsType = 'Google_Service_Dataflow_PubSubIODetails';
  protected $pubsubDetailsDataType = 'array';
  protected $sdkVersionType = 'Google_Service_Dataflow_SdkVersion';
  protected $sdkVersionDataType = '';
  protected $spannerDetailsType = 'Google_Service_Dataflow_SpannerIODetails';
  protected $spannerDetailsDataType = 'array';

  /**
   * @param Google_Service_Dataflow_BigTableIODetails[]
   */
  public function setBigTableDetails($bigTableDetails)
  {
    $this->bigTableDetails = $bigTableDetails;
  }
  /**
   * @return Google_Service_Dataflow_BigTableIODetails[]
   */
  public function getBigTableDetails()
  {
    return $this->bigTableDetails;
  }
  /**
   * @param Google_Service_Dataflow_BigQueryIODetails[]
   */
  public function setBigqueryDetails($bigqueryDetails)
  {
    $this->bigqueryDetails = $bigqueryDetails;
  }
  /**
   * @return Google_Service_Dataflow_BigQueryIODetails[]
   */
  public function getBigqueryDetails()
  {
    return $this->bigqueryDetails;
  }
  /**
   * @param Google_Service_Dataflow_DatastoreIODetails[]
   */
  public function setDatastoreDetails($datastoreDetails)
  {
    $this->datastoreDetails = $datastoreDetails;
  }
  /**
   * @return Google_Service_Dataflow_DatastoreIODetails[]
   */
  public function getDatastoreDetails()
  {
    return $this->datastoreDetails;
  }
  /**
   * @param Google_Service_Dataflow_FileIODetails[]
   */
  public function setFileDetails($fileDetails)
  {
    $this->fileDetails = $fileDetails;
  }
  /**
   * @return Google_Service_Dataflow_FileIODetails[]
   */
  public function getFileDetails()
  {
    return $this->fileDetails;
  }
  /**
   * @param Google_Service_Dataflow_PubSubIODetails[]
   */
  public function setPubsubDetails($pubsubDetails)
  {
    $this->pubsubDetails = $pubsubDetails;
  }
  /**
   * @return Google_Service_Dataflow_PubSubIODetails[]
   */
  public function getPubsubDetails()
  {
    return $this->pubsubDetails;
  }
  /**
   * @param Google_Service_Dataflow_SdkVersion
   */
  public function setSdkVersion(Google_Service_Dataflow_SdkVersion $sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  /**
   * @return Google_Service_Dataflow_SdkVersion
   */
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
  /**
   * @param Google_Service_Dataflow_SpannerIODetails[]
   */
  public function setSpannerDetails($spannerDetails)
  {
    $this->spannerDetails = $spannerDetails;
  }
  /**
   * @return Google_Service_Dataflow_SpannerIODetails[]
   */
  public function getSpannerDetails()
  {
    return $this->spannerDetails;
  }
}
