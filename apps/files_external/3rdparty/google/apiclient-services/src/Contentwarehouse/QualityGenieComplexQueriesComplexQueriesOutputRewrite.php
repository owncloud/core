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

class QualityGenieComplexQueriesComplexQueriesOutputRewrite extends \Google\Collection
{
  protected $collection_key = 'entities';
  protected $entitiesType = QualityGenieComplexQueriesComplexQueriesOutputRewriteEntity::class;
  protected $entitiesDataType = 'array';
  /**
   * @var string
   */
  public $rewriteType;
  /**
   * @var string
   */
  public $textualRewrite;

  /**
   * @param QualityGenieComplexQueriesComplexQueriesOutputRewriteEntity[]
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return QualityGenieComplexQueriesComplexQueriesOutputRewriteEntity[]
   */
  public function getEntities()
  {
    return $this->entities;
  }
  /**
   * @param string
   */
  public function setRewriteType($rewriteType)
  {
    $this->rewriteType = $rewriteType;
  }
  /**
   * @return string
   */
  public function getRewriteType()
  {
    return $this->rewriteType;
  }
  /**
   * @param string
   */
  public function setTextualRewrite($textualRewrite)
  {
    $this->textualRewrite = $textualRewrite;
  }
  /**
   * @return string
   */
  public function getTextualRewrite()
  {
    return $this->textualRewrite;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityGenieComplexQueriesComplexQueriesOutputRewrite::class, 'Google_Service_Contentwarehouse_QualityGenieComplexQueriesComplexQueriesOutputRewrite');
