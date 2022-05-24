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

namespace Google\Service\TrafficDirectorService;

class NodeMatcher extends \Google\Collection
{
  protected $collection_key = 'nodeMetadatas';
  protected $nodeIdType = StringMatcher::class;
  protected $nodeIdDataType = '';
  protected $nodeMetadatasType = StructMatcher::class;
  protected $nodeMetadatasDataType = 'array';

  /**
   * @param StringMatcher
   */
  public function setNodeId(StringMatcher $nodeId)
  {
    $this->nodeId = $nodeId;
  }
  /**
   * @return StringMatcher
   */
  public function getNodeId()
  {
    return $this->nodeId;
  }
  /**
   * @param StructMatcher[]
   */
  public function setNodeMetadatas($nodeMetadatas)
  {
    $this->nodeMetadatas = $nodeMetadatas;
  }
  /**
   * @return StructMatcher[]
   */
  public function getNodeMetadatas()
  {
    return $this->nodeMetadatas;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeMatcher::class, 'Google_Service_TrafficDirectorService_NodeMatcher');
