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
  public $action;
  public $path;
  public $pathFilters;
  protected $pathValueMatchersType = GoogleCloudRecommenderV1ValueMatcher::class;
  protected $pathValueMatchersDataType = 'map';
  public $resource;
  public $resourceType;
  public $sourcePath;
  public $sourceResource;
  public $value;
  protected $valueMatcherType = GoogleCloudRecommenderV1ValueMatcher::class;
  protected $valueMatcherDataType = '';

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setPathFilters($pathFilters)
  {
    $this->pathFilters = $pathFilters;
  }
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
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
  public function setSourcePath($sourcePath)
  {
    $this->sourcePath = $sourcePath;
  }
  public function getSourcePath()
  {
    return $this->sourcePath;
  }
  public function setSourceResource($sourceResource)
  {
    $this->sourceResource = $sourceResource;
  }
  public function getSourceResource()
  {
    return $this->sourceResource;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
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
