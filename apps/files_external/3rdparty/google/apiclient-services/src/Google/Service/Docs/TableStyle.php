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

class Google_Service_Docs_TableStyle extends Google_Collection
{
  protected $collection_key = 'tableColumnProperties';
  protected $tableColumnPropertiesType = 'Google_Service_Docs_TableColumnProperties';
  protected $tableColumnPropertiesDataType = 'array';

  /**
   * @param Google_Service_Docs_TableColumnProperties
   */
  public function setTableColumnProperties($tableColumnProperties)
  {
    $this->tableColumnProperties = $tableColumnProperties;
  }
  /**
   * @return Google_Service_Docs_TableColumnProperties
   */
  public function getTableColumnProperties()
  {
    return $this->tableColumnProperties;
  }
}
