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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1RoutineSpec extends \Google\Collection
{
  protected $collection_key = 'routineArguments';
  protected $bigqueryRoutineSpecType = GoogleCloudDatacatalogV1BigQueryRoutineSpec::class;
  protected $bigqueryRoutineSpecDataType = '';
  /**
   * @var string
   */
  public $definitionBody;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $returnType;
  protected $routineArgumentsType = GoogleCloudDatacatalogV1RoutineSpecArgument::class;
  protected $routineArgumentsDataType = 'array';
  /**
   * @var string
   */
  public $routineType;

  /**
   * @param GoogleCloudDatacatalogV1BigQueryRoutineSpec
   */
  public function setBigqueryRoutineSpec(GoogleCloudDatacatalogV1BigQueryRoutineSpec $bigqueryRoutineSpec)
  {
    $this->bigqueryRoutineSpec = $bigqueryRoutineSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1BigQueryRoutineSpec
   */
  public function getBigqueryRoutineSpec()
  {
    return $this->bigqueryRoutineSpec;
  }
  /**
   * @param string
   */
  public function setDefinitionBody($definitionBody)
  {
    $this->definitionBody = $definitionBody;
  }
  /**
   * @return string
   */
  public function getDefinitionBody()
  {
    return $this->definitionBody;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setReturnType($returnType)
  {
    $this->returnType = $returnType;
  }
  /**
   * @return string
   */
  public function getReturnType()
  {
    return $this->returnType;
  }
  /**
   * @param GoogleCloudDatacatalogV1RoutineSpecArgument[]
   */
  public function setRoutineArguments($routineArguments)
  {
    $this->routineArguments = $routineArguments;
  }
  /**
   * @return GoogleCloudDatacatalogV1RoutineSpecArgument[]
   */
  public function getRoutineArguments()
  {
    return $this->routineArguments;
  }
  /**
   * @param string
   */
  public function setRoutineType($routineType)
  {
    $this->routineType = $routineType;
  }
  /**
   * @return string
   */
  public function getRoutineType()
  {
    return $this->routineType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1RoutineSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1RoutineSpec');
