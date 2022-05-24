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

namespace Google\Service\Bigquery;

class Routine extends \Google\Collection
{
  protected $collection_key = 'importedLibraries';
  protected $argumentsType = Argument::class;
  protected $argumentsDataType = 'array';
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $definitionBody;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $determinismLevel;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string[]
   */
  public $importedLibraries;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $lastModifiedTime;
  protected $returnTableTypeType = StandardSqlTableType::class;
  protected $returnTableTypeDataType = '';
  protected $returnTypeType = StandardSqlDataType::class;
  protected $returnTypeDataType = '';
  protected $routineReferenceType = RoutineReference::class;
  protected $routineReferenceDataType = '';
  /**
   * @var string
   */
  public $routineType;
  /**
   * @var bool
   */
  public $strictMode;

  /**
   * @param Argument[]
   */
  public function setArguments($arguments)
  {
    $this->arguments = $arguments;
  }
  /**
   * @return Argument[]
   */
  public function getArguments()
  {
    return $this->arguments;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
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
  public function setDeterminismLevel($determinismLevel)
  {
    $this->determinismLevel = $determinismLevel;
  }
  /**
   * @return string
   */
  public function getDeterminismLevel()
  {
    return $this->determinismLevel;
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
  public function setImportedLibraries($importedLibraries)
  {
    $this->importedLibraries = $importedLibraries;
  }
  /**
   * @return string[]
   */
  public function getImportedLibraries()
  {
    return $this->importedLibraries;
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
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  /**
   * @param StandardSqlTableType
   */
  public function setReturnTableType(StandardSqlTableType $returnTableType)
  {
    $this->returnTableType = $returnTableType;
  }
  /**
   * @return StandardSqlTableType
   */
  public function getReturnTableType()
  {
    return $this->returnTableType;
  }
  /**
   * @param StandardSqlDataType
   */
  public function setReturnType(StandardSqlDataType $returnType)
  {
    $this->returnType = $returnType;
  }
  /**
   * @return StandardSqlDataType
   */
  public function getReturnType()
  {
    return $this->returnType;
  }
  /**
   * @param RoutineReference
   */
  public function setRoutineReference(RoutineReference $routineReference)
  {
    $this->routineReference = $routineReference;
  }
  /**
   * @return RoutineReference
   */
  public function getRoutineReference()
  {
    return $this->routineReference;
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
  /**
   * @param bool
   */
  public function setStrictMode($strictMode)
  {
    $this->strictMode = $strictMode;
  }
  /**
   * @return bool
   */
  public function getStrictMode()
  {
    return $this->strictMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Routine::class, 'Google_Service_Bigquery_Routine');
