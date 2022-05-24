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

namespace Google\Service\CloudAsset;

class IamPolicyAnalysisOutputConfig extends \Google\Model
{
  protected $bigqueryDestinationType = GoogleCloudAssetV1BigQueryDestination::class;
  protected $bigqueryDestinationDataType = '';
  protected $gcsDestinationType = GoogleCloudAssetV1GcsDestination::class;
  protected $gcsDestinationDataType = '';

  /**
   * @param GoogleCloudAssetV1BigQueryDestination
   */
  public function setBigqueryDestination(GoogleCloudAssetV1BigQueryDestination $bigqueryDestination)
  {
    $this->bigqueryDestination = $bigqueryDestination;
  }
  /**
   * @return GoogleCloudAssetV1BigQueryDestination
   */
  public function getBigqueryDestination()
  {
    return $this->bigqueryDestination;
  }
  /**
   * @param GoogleCloudAssetV1GcsDestination
   */
  public function setGcsDestination(GoogleCloudAssetV1GcsDestination $gcsDestination)
  {
    $this->gcsDestination = $gcsDestination;
  }
  /**
   * @return GoogleCloudAssetV1GcsDestination
   */
  public function getGcsDestination()
  {
    return $this->gcsDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IamPolicyAnalysisOutputConfig::class, 'Google_Service_CloudAsset_IamPolicyAnalysisOutputConfig');
