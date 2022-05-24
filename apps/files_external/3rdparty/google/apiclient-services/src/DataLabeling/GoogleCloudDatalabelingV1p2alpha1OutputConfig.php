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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1p2alpha1OutputConfig extends \Google\Model
{
  protected $gcsDestinationType = GoogleCloudDatalabelingV1p2alpha1GcsDestination::class;
  protected $gcsDestinationDataType = '';
  protected $gcsFolderDestinationType = GoogleCloudDatalabelingV1p2alpha1GcsFolderDestination::class;
  protected $gcsFolderDestinationDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1p2alpha1GcsDestination
   */
  public function setGcsDestination(GoogleCloudDatalabelingV1p2alpha1GcsDestination $gcsDestination)
  {
    $this->gcsDestination = $gcsDestination;
  }
  /**
   * @return GoogleCloudDatalabelingV1p2alpha1GcsDestination
   */
  public function getGcsDestination()
  {
    return $this->gcsDestination;
  }
  /**
   * @param GoogleCloudDatalabelingV1p2alpha1GcsFolderDestination
   */
  public function setGcsFolderDestination(GoogleCloudDatalabelingV1p2alpha1GcsFolderDestination $gcsFolderDestination)
  {
    $this->gcsFolderDestination = $gcsFolderDestination;
  }
  /**
   * @return GoogleCloudDatalabelingV1p2alpha1GcsFolderDestination
   */
  public function getGcsFolderDestination()
  {
    return $this->gcsFolderDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1p2alpha1OutputConfig::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1p2alpha1OutputConfig');
