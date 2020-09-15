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

class Google_Service_TrafficDirectorService_NodeMatcher extends Google_Collection
{
  protected $collection_key = 'nodeMetadatas';
  protected $nodeIdType = 'Google_Service_TrafficDirectorService_StringMatcher';
  protected $nodeIdDataType = '';
  protected $nodeMetadatasType = 'Google_Service_TrafficDirectorService_StructMatcher';
  protected $nodeMetadatasDataType = 'array';

  /**
   * @param Google_Service_TrafficDirectorService_StringMatcher
   */
  public function setNodeId(Google_Service_TrafficDirectorService_StringMatcher $nodeId)
  {
    $this->nodeId = $nodeId;
  }
  /**
   * @return Google_Service_TrafficDirectorService_StringMatcher
   */
  public function getNodeId()
  {
    return $this->nodeId;
  }
  /**
   * @param Google_Service_TrafficDirectorService_StructMatcher
   */
  public function setNodeMetadatas($nodeMetadatas)
  {
    $this->nodeMetadatas = $nodeMetadatas;
  }
  /**
   * @return Google_Service_TrafficDirectorService_StructMatcher
   */
  public function getNodeMetadatas()
  {
    return $this->nodeMetadatas;
  }
}
