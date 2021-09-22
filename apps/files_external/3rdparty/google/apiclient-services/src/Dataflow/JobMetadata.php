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

namespace Google\Service\Dataflow;

class JobMetadata extends \Google\Collection
{
  protected $collection_key = 'spannerDetails';
  protected $bigTableDetailsType = BigTableIODetails::class;
  protected $bigTableDetailsDataType = 'array';
  protected $bigqueryDetailsType = BigQueryIODetails::class;
  protected $bigqueryDetailsDataType = 'array';
  protected $datastoreDetailsType = DatastoreIODetails::class;
  protected $datastoreDetailsDataType = 'array';
  protected $fileDetailsType = FileIODetails::class;
  protected $fileDetailsDataType = 'array';
  protected $pubsubDetailsType = PubSubIODetails::class;
  protected $pubsubDetailsDataType = 'array';
  protected $sdkVersionType = SdkVersion::class;
  protected $sdkVersionDataType = '';
  protected $spannerDetailsType = SpannerIODetails::class;
  protected $spannerDetailsDataType = 'array';

  /**
   * @param BigTableIODetails[]
   */
  public function setBigTableDetails($bigTableDetails)
  {
    $this->bigTableDetails = $bigTableDetails;
  }
  /**
   * @return BigTableIODetails[]
   */
  public function getBigTableDetails()
  {
    return $this->bigTableDetails;
  }
  /**
   * @param BigQueryIODetails[]
   */
  public function setBigqueryDetails($bigqueryDetails)
  {
    $this->bigqueryDetails = $bigqueryDetails;
  }
  /**
   * @return BigQueryIODetails[]
   */
  public function getBigqueryDetails()
  {
    return $this->bigqueryDetails;
  }
  /**
   * @param DatastoreIODetails[]
   */
  public function setDatastoreDetails($datastoreDetails)
  {
    $this->datastoreDetails = $datastoreDetails;
  }
  /**
   * @return DatastoreIODetails[]
   */
  public function getDatastoreDetails()
  {
    return $this->datastoreDetails;
  }
  /**
   * @param FileIODetails[]
   */
  public function setFileDetails($fileDetails)
  {
    $this->fileDetails = $fileDetails;
  }
  /**
   * @return FileIODetails[]
   */
  public function getFileDetails()
  {
    return $this->fileDetails;
  }
  /**
   * @param PubSubIODetails[]
   */
  public function setPubsubDetails($pubsubDetails)
  {
    $this->pubsubDetails = $pubsubDetails;
  }
  /**
   * @return PubSubIODetails[]
   */
  public function getPubsubDetails()
  {
    return $this->pubsubDetails;
  }
  /**
   * @param SdkVersion
   */
  public function setSdkVersion(SdkVersion $sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  /**
   * @return SdkVersion
   */
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
  /**
   * @param SpannerIODetails[]
   */
  public function setSpannerDetails($spannerDetails)
  {
    $this->spannerDetails = $spannerDetails;
  }
  /**
   * @return SpannerIODetails[]
   */
  public function getSpannerDetails()
  {
    return $this->spannerDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobMetadata::class, 'Google_Service_Dataflow_JobMetadata');
