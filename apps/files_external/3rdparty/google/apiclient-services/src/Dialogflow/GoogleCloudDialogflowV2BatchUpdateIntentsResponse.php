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

class GoogleCloudDialogflowV2BatchUpdateIntentsResponse extends \Google\Collection
{
  protected $collection_key = 'intents';
  protected $intentsType = GoogleCloudDialogflowV2Intent::class;
  protected $intentsDataType = 'array';

  /**
   * @param GoogleCloudDialogflowV2Intent[]
   */
  public function setIntents($intents)
  {
    $this->intents = $intents;
  }
  /**
   * @return GoogleCloudDialogflowV2Intent[]
   */
  public function getIntents()
  {
    return $this->intents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2BatchUpdateIntentsResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2BatchUpdateIntentsResponse');
