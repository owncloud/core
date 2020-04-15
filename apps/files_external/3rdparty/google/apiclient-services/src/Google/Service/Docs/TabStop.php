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

class Google_Service_Docs_TabStop extends Google_Model
{
  public $alignment;
  protected $offsetType = 'Google_Service_Docs_Dimension';
  protected $offsetDataType = '';

  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  public function getAlignment()
  {
    return $this->alignment;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setOffset(Google_Service_Docs_Dimension $offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getOffset()
  {
    return $this->offset;
  }
}
