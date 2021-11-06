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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1IntentMessageTableCardRow extends \Google\Collection
{
  protected $collection_key = 'cells';
  protected $cellsType = GoogleCloudDialogflowV2beta1IntentMessageTableCardCell::class;
  protected $cellsDataType = 'array';
  public $dividerAfter;

  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageTableCardCell[]
   */
  public function setCells($cells)
  {
    $this->cells = $cells;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageTableCardCell[]
   */
  public function getCells()
  {
    return $this->cells;
  }
  public function setDividerAfter($dividerAfter)
  {
    $this->dividerAfter = $dividerAfter;
  }
  public function getDividerAfter()
  {
    return $this->dividerAfter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageTableCardRow::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageTableCardRow');
