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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1DocumentPageMatrix extends \Google\Model
{
  /**
   * @var bool
   */
  public $applied;
  /**
   * @var int
   */
  public $cols;
  /**
   * @var string
   */
  public $data;
  /**
   * @var int
   */
  public $rows;
  /**
   * @var int
   */
  public $type;

  /**
   * @param bool
   */
  public function setApplied($applied)
  {
    $this->applied = $applied;
  }
  /**
   * @return bool
   */
  public function getApplied()
  {
    return $this->applied;
  }
  /**
   * @param int
   */
  public function setCols($cols)
  {
    $this->cols = $cols;
  }
  /**
   * @return int
   */
  public function getCols()
  {
    return $this->cols;
  }
  /**
   * @param string
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param int
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return int
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentPageMatrix::class, 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageMatrix');
