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

class Google_Service_Bigquery_Routine extends Google_Collection
{
  protected $collection_key = 'importedLibraries';
  protected $argumentsType = 'Google_Service_Bigquery_Argument';
  protected $argumentsDataType = 'array';
  public $creationTime;
  public $definitionBody;
  public $description;
  public $determinismLevel;
  public $etag;
  public $importedLibraries;
  public $language;
  public $lastModifiedTime;
  protected $returnTypeType = 'Google_Service_Bigquery_StandardSqlDataType';
  protected $returnTypeDataType = '';
  protected $routineReferenceType = 'Google_Service_Bigquery_RoutineReference';
  protected $routineReferenceDataType = '';
  public $routineType;

  /**
   * @param Google_Service_Bigquery_Argument[]
   */
  public function setArguments($arguments)
  {
    $this->arguments = $arguments;
  }
  /**
   * @return Google_Service_Bigquery_Argument[]
   */
  public function getArguments()
  {
    return $this->arguments;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDefinitionBody($definitionBody)
  {
    $this->definitionBody = $definitionBody;
  }
  public function getDefinitionBody()
  {
    return $this->definitionBody;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDeterminismLevel($determinismLevel)
  {
    $this->determinismLevel = $determinismLevel;
  }
  public function getDeterminismLevel()
  {
    return $this->determinismLevel;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setImportedLibraries($importedLibraries)
  {
    $this->importedLibraries = $importedLibraries;
  }
  public function getImportedLibraries()
  {
    return $this->importedLibraries;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  /**
   * @param Google_Service_Bigquery_StandardSqlDataType
   */
  public function setReturnType(Google_Service_Bigquery_StandardSqlDataType $returnType)
  {
    $this->returnType = $returnType;
  }
  /**
   * @return Google_Service_Bigquery_StandardSqlDataType
   */
  public function getReturnType()
  {
    return $this->returnType;
  }
  /**
   * @param Google_Service_Bigquery_RoutineReference
   */
  public function setRoutineReference(Google_Service_Bigquery_RoutineReference $routineReference)
  {
    $this->routineReference = $routineReference;
  }
  /**
   * @return Google_Service_Bigquery_RoutineReference
   */
  public function getRoutineReference()
  {
    return $this->routineReference;
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
