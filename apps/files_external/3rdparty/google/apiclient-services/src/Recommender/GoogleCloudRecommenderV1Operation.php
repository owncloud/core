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

namespace Google\Service\Recommender;

class GoogleCloudRecommenderV1Operation extends \Google\Model
{
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $path;
  /**
   * @var array[]
   */
  public $pathFilters;
  protected $pathValueMatchersType = GoogleCloudRecommenderV1ValueMatcher::class;
  protected $pathValueMatchersDataType = 'map';
  /**
   * @var string
   */
  public $resource;
  /**
   * @var string
   */
  public $resourceType;
  /**
   * @var string
   */
  public $sourcePath;
  /**
   * @var string
   */
  public $sourceResource;
  /**
   * @var array
   */
  public $value;
  protected $valueMatcherType = GoogleCloudRecommenderV1ValueMatcher::class;
  protected $valueMatcherDataType = '';

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param array[]
   */
  public function setPathFilters($pathFilters)
  {
    $this->pathFilters = $pathFilters;
  }
  /**
   * @return array[]
   */
  public function getPathFilters()
  {
    return $this->pathFilters;
  }
  /**
   * @param GoogleCloudRecommenderV1ValueMatcher[]
   */
  public function setPathValueMatchers($pathValueMatchers)
  {
    $this->pathValueMatchers = $pathValueMatchers;
  }
  /**
   * @return GoogleCloudRecommenderV1ValueMatcher[]
   */
  public function getPathValueMatchers()
  {
    return $this->pathValueMatchers;
  }
  /**
   * @param string
   */
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return string
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
  /**
   * @param string
   */
  public function setSourcePath($sourcePath)
  {
    $this->sourcePath = $sourcePath;
  }
  /**
   * @return string
   */
  public function getSourcePath()
  {
    return $this->sourcePath;
  }
  /**
   * @param string
   */
  public function setSourceResource($sourceResource)
  {
    $this->sourceResource = $sourceResource;
  }
  /**
   * @return string
   */
  public function getSourceResource()
  {
    return $this->sourceResource;
  }
  /**
   * @param array
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return array
   */
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param GoogleCloudRecommenderV1ValueMatcher
   */
  public function setValueMatcher(GoogleCloudRecommenderV1ValueMatcher $valueMatcher)
  {
    $this->valueMatcher = $valueMatcher;
  }
  /**
   * @return GoogleCloudRecommenderV1ValueMatcher
   */
  public function getValueMatcher()
  {
    return $this->valueMatcher;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommenderV1Operation::class, 'Google_Service_Recommender_GoogleCloudRecommenderV1Operation');
