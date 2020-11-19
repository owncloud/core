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

class Google_Service_Area120Tables_UpdateRowRequest extends Google_Model
{
  protected $rowType = 'Google_Service_Area120Tables_Row';
  protected $rowDataType = '';
  public $updateMask;
  public $view;

  /**
   * @param Google_Service_Area120Tables_Row
   */
  public function setRow(Google_Service_Area120Tables_Row $row)
  {
    $this->row = $row;
  }
  /**
   * @return Google_Service_Area120Tables_Row
   */
  public function getRow()
  {
    return $this->row;
  }
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  public function setView($view)
  {
    $this->view = $view;
  }
  public function getView()
  {
    return $this->view;
  }
}
