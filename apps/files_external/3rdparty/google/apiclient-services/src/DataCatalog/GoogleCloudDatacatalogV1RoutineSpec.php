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
  public $definitionBody;
  public $language;
  public $returnType;
  protected $routineArgumentsType = GoogleCloudDatacatalogV1RoutineSpecArgument::class;
  protected $routineArgumentsDataType = 'array';
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
  public function setDefinitionBody($definitionBody)
  {
    $this->definitionBody = $definitionBody;
  }
  public function getDefinitionBody()
  {
    return $this->definitionBody;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setReturnType($returnType)
  {
    $this->returnType = $returnType;
  }
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
  public function setRoutineType($routineType)
  {
    $this->routineType = $routineType;
  }
  public function getRoutineType()
  {
    return $this->routineType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1RoutineSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1RoutineSpec');
