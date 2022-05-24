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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1ImportDataOperationResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $dataset;
  /**
   * @var int
   */
  public $importCount;
  /**
   * @var int
   */
  public $totalCount;

  /**
   * @param string
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return string
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param int
   */
  public function setImportCount($importCount)
  {
    $this->importCount = $importCount;
  }
  /**
   * @return int
   */
  public function getImportCount()
  {
    return $this->importCount;
  }
  /**
   * @param int
   */
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  /**
   * @return int
   */
  public function getTotalCount()
  {
    return $this->totalCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1ImportDataOperationResponse::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImportDataOperationResponse');
