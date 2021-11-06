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

class GoogleCloudDatalabelingV1beta1VideoClassificationConfig extends \Google\Collection
{
  protected $collection_key = 'annotationSpecSetConfigs';
  protected $annotationSpecSetConfigsType = GoogleCloudDatalabelingV1beta1AnnotationSpecSetConfig::class;
  protected $annotationSpecSetConfigsDataType = 'array';
  public $applyShotDetection;

  /**
   * @param GoogleCloudDatalabelingV1beta1AnnotationSpecSetConfig[]
   */
  public function setAnnotationSpecSetConfigs($annotationSpecSetConfigs)
  {
    $this->annotationSpecSetConfigs = $annotationSpecSetConfigs;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1AnnotationSpecSetConfig[]
   */
  public function getAnnotationSpecSetConfigs()
  {
    return $this->annotationSpecSetConfigs;
  }
  public function setApplyShotDetection($applyShotDetection)
  {
    $this->applyShotDetection = $applyShotDetection;
  }
  public function getApplyShotDetection()
  {
    return $this->applyShotDetection;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1VideoClassificationConfig::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoClassificationConfig');
