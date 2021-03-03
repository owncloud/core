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

class Google_Service_Recommender_GoogleCloudRecommenderV1Operation extends Google_Model
{
  public $action;
  public $path;
  public $pathFilters;
  protected $pathValueMatchersType = 'Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher';
  protected $pathValueMatchersDataType = 'map';
  public $resource;
  public $resourceType;
  public $sourcePath;
  public $sourceResource;
  public $value;
  protected $valueMatcherType = 'Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher';
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
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher[]
   */
  public function setPathValueMatchers($pathValueMatchers)
  {
    $this->pathValueMatchers = $pathValueMatchers;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher[]
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
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher
   */
  public function setValueMatcher(Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher $valueMatcher)
  {
    $this->valueMatcher = $valueMatcher;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1ValueMatcher
   */
  public function getValueMatcher()
  {
    return $this->valueMatcher;
  }
}
