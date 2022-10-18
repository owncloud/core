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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2TransformationDetails extends \Google\Collection
{
  protected $collection_key = 'transformation';
  /**
   * @var string
   */
  public $containerName;
  /**
   * @var string
   */
  public $resourceName;
  protected $statusDetailsType = GooglePrivacyDlpV2TransformationResultStatus::class;
  protected $statusDetailsDataType = '';
  protected $transformationType = GooglePrivacyDlpV2TransformationDescription::class;
  protected $transformationDataType = 'array';
  protected $transformationLocationType = GooglePrivacyDlpV2TransformationLocation::class;
  protected $transformationLocationDataType = '';
  /**
   * @var string
   */
  public $transformedBytes;

  /**
   * @param string
   */
  public function setContainerName($containerName)
  {
    $this->containerName = $containerName;
  }
  /**
   * @return string
   */
  public function getContainerName()
  {
    return $this->containerName;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationResultStatus
   */
  public function setStatusDetails(GooglePrivacyDlpV2TransformationResultStatus $statusDetails)
  {
    $this->statusDetails = $statusDetails;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationResultStatus
   */
  public function getStatusDetails()
  {
    return $this->statusDetails;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationDescription[]
   */
  public function setTransformation($transformation)
  {
    $this->transformation = $transformation;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationDescription[]
   */
  public function getTransformation()
  {
    return $this->transformation;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationLocation
   */
  public function setTransformationLocation(GooglePrivacyDlpV2TransformationLocation $transformationLocation)
  {
    $this->transformationLocation = $transformationLocation;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationLocation
   */
  public function getTransformationLocation()
  {
    return $this->transformationLocation;
  }
  /**
   * @param string
   */
  public function setTransformedBytes($transformedBytes)
  {
    $this->transformedBytes = $transformedBytes;
  }
  /**
   * @return string
   */
  public function getTransformedBytes()
  {
    return $this->transformedBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2TransformationDetails::class, 'Google_Service_DLP_GooglePrivacyDlpV2TransformationDetails');
