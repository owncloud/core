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

namespace Google\Service\Sheets;

class UpdateDeveloperMetadataRequest extends \Google\Collection
{
  protected $collection_key = 'dataFilters';
  protected $dataFiltersType = DataFilter::class;
  protected $dataFiltersDataType = 'array';
  protected $developerMetadataType = DeveloperMetadata::class;
  protected $developerMetadataDataType = '';
  public $fields;

  /**
   * @param DataFilter[]
   */
  public function setDataFilters($dataFilters)
  {
    $this->dataFilters = $dataFilters;
  }
  /**
   * @return DataFilter[]
   */
  public function getDataFilters()
  {
    return $this->dataFilters;
  }
  /**
   * @param DeveloperMetadata
   */
  public function setDeveloperMetadata(DeveloperMetadata $developerMetadata)
  {
    $this->developerMetadata = $developerMetadata;
  }
  /**
   * @return DeveloperMetadata
   */
  public function getDeveloperMetadata()
  {
    return $this->developerMetadata;
  }
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateDeveloperMetadataRequest::class, 'Google_Service_Sheets_UpdateDeveloperMetadataRequest');
