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

class Google_Service_Spanner_PrefixNode extends Google_Model
{
  public $dataSourceNode;
  public $depth;
  public $endIndex;
  public $startIndex;
  public $word;

  public function setDataSourceNode($dataSourceNode)
  {
    $this->dataSourceNode = $dataSourceNode;
  }
  public function getDataSourceNode()
  {
    return $this->dataSourceNode;
  }
  public function setDepth($depth)
  {
    $this->depth = $depth;
  }
  public function getDepth()
  {
    return $this->depth;
  }
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setWord($word)
  {
    $this->word = $word;
  }
  public function getWord()
  {
    return $this->word;
  }
}
