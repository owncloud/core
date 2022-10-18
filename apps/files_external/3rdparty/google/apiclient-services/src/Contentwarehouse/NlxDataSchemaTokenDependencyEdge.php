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

namespace Google\Service\Contentwarehouse;

class NlxDataSchemaTokenDependencyEdge extends \Google\Model
{
  /**
   * @var string
   */
  public $deprel;
  protected $headType = MultiscalePointerIndex::class;
  protected $headDataType = '';

  /**
   * @param string
   */
  public function setDeprel($deprel)
  {
    $this->deprel = $deprel;
  }
  /**
   * @return string
   */
  public function getDeprel()
  {
    return $this->deprel;
  }
  /**
   * @param MultiscalePointerIndex
   */
  public function setHead(MultiscalePointerIndex $head)
  {
    $this->head = $head;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getHead()
  {
    return $this->head;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlxDataSchemaTokenDependencyEdge::class, 'Google_Service_Contentwarehouse_NlxDataSchemaTokenDependencyEdge');
