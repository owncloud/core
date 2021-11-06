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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1ListStudiesResponse extends \Google\Collection
{
  protected $collection_key = 'studies';
  protected $studiesType = GoogleCloudMlV1Study::class;
  protected $studiesDataType = 'array';

  /**
   * @param GoogleCloudMlV1Study[]
   */
  public function setStudies($studies)
  {
    $this->studies = $studies;
  }
  /**
   * @return GoogleCloudMlV1Study[]
   */
  public function getStudies()
  {
    return $this->studies;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1ListStudiesResponse::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ListStudiesResponse');
