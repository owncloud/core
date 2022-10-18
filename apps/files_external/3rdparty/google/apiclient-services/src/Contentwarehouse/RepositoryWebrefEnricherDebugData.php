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

class RepositoryWebrefEnricherDebugData extends \Google\Collection
{
  protected $collection_key = 'relatedPage';
  protected $nonMidPropertiesType = RepositoryWebrefCompactFlatPropertyValue::class;
  protected $nonMidPropertiesDataType = 'array';
  protected $referencePageType = RepositoryWebrefSimplifiedCompositeDoc::class;
  protected $referencePageDataType = 'array';
  protected $relatedPageType = RepositoryWebrefSimplifiedCompositeDoc::class;
  protected $relatedPageDataType = 'array';

  /**
   * @param RepositoryWebrefCompactFlatPropertyValue[]
   */
  public function setNonMidProperties($nonMidProperties)
  {
    $this->nonMidProperties = $nonMidProperties;
  }
  /**
   * @return RepositoryWebrefCompactFlatPropertyValue[]
   */
  public function getNonMidProperties()
  {
    return $this->nonMidProperties;
  }
  /**
   * @param RepositoryWebrefSimplifiedCompositeDoc[]
   */
  public function setReferencePage($referencePage)
  {
    $this->referencePage = $referencePage;
  }
  /**
   * @return RepositoryWebrefSimplifiedCompositeDoc[]
   */
  public function getReferencePage()
  {
    return $this->referencePage;
  }
  /**
   * @param RepositoryWebrefSimplifiedCompositeDoc[]
   */
  public function setRelatedPage($relatedPage)
  {
    $this->relatedPage = $relatedPage;
  }
  /**
   * @return RepositoryWebrefSimplifiedCompositeDoc[]
   */
  public function getRelatedPage()
  {
    return $this->relatedPage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefEnricherDebugData::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEnricherDebugData');
