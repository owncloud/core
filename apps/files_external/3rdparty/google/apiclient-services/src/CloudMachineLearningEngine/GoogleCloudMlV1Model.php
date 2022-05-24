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

class GoogleCloudMlV1Model extends \Google\Collection
{
  protected $collection_key = 'regions';
  protected $defaultVersionType = GoogleCloudMlV1Version::class;
  protected $defaultVersionDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $onlinePredictionConsoleLogging;
  /**
   * @var bool
   */
  public $onlinePredictionLogging;
  /**
   * @var string[]
   */
  public $regions;

  /**
   * @param GoogleCloudMlV1Version
   */
  public function setDefaultVersion(GoogleCloudMlV1Version $defaultVersion)
  {
    $this->defaultVersion = $defaultVersion;
  }
  /**
   * @return GoogleCloudMlV1Version
   */
  public function getDefaultVersion()
  {
    return $this->defaultVersion;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setOnlinePredictionConsoleLogging($onlinePredictionConsoleLogging)
  {
    $this->onlinePredictionConsoleLogging = $onlinePredictionConsoleLogging;
  }
  /**
   * @return bool
   */
  public function getOnlinePredictionConsoleLogging()
  {
    return $this->onlinePredictionConsoleLogging;
  }
  /**
   * @param bool
   */
  public function setOnlinePredictionLogging($onlinePredictionLogging)
  {
    $this->onlinePredictionLogging = $onlinePredictionLogging;
  }
  /**
   * @return bool
   */
  public function getOnlinePredictionLogging()
  {
    return $this->onlinePredictionLogging;
  }
  /**
   * @param string[]
   */
  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  /**
   * @return string[]
   */
  public function getRegions()
  {
    return $this->regions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Model::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Model');
