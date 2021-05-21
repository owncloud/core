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

class Google_Service_Document_GoogleCloudDocumentaiV1DocumentShardInfo extends Google_Model
{
  public $shardCount;
  public $shardIndex;
  public $textOffset;

  public function setShardCount($shardCount)
  {
    $this->shardCount = $shardCount;
  }
  public function getShardCount()
  {
    return $this->shardCount;
  }
  public function setShardIndex($shardIndex)
  {
    $this->shardIndex = $shardIndex;
  }
  public function getShardIndex()
  {
    return $this->shardIndex;
  }
  public function setTextOffset($textOffset)
  {
    $this->textOffset = $textOffset;
  }
  public function getTextOffset()
  {
    return $this->textOffset;
  }
}
