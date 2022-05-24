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

namespace Google\Service\CloudSearch;

class ItemStatus extends \Google\Collection
{
  protected $collection_key = 'repositoryErrors';
  /**
   * @var string
   */
  public $code;
  protected $processingErrorsType = ProcessingError::class;
  protected $processingErrorsDataType = 'array';
  protected $repositoryErrorsType = RepositoryError::class;
  protected $repositoryErrorsDataType = 'array';

  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param ProcessingError[]
   */
  public function setProcessingErrors($processingErrors)
  {
    $this->processingErrors = $processingErrors;
  }
  /**
   * @return ProcessingError[]
   */
  public function getProcessingErrors()
  {
    return $this->processingErrors;
  }
  /**
   * @param RepositoryError[]
   */
  public function setRepositoryErrors($repositoryErrors)
  {
    $this->repositoryErrors = $repositoryErrors;
  }
  /**
   * @return RepositoryError[]
   */
  public function getRepositoryErrors()
  {
    return $this->repositoryErrors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ItemStatus::class, 'Google_Service_CloudSearch_ItemStatus');
