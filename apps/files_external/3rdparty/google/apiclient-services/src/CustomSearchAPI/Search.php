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

namespace Google\Service\CustomSearchAPI;

class Search extends \Google\Collection
{
  protected $collection_key = 'promotions';
  public $context;
  protected $itemsType = Result::class;
  protected $itemsDataType = 'array';
  public $kind;
  protected $promotionsType = Promotion::class;
  protected $promotionsDataType = 'array';
  protected $queriesType = SearchQueries::class;
  protected $queriesDataType = '';
  protected $searchInformationType = SearchSearchInformation::class;
  protected $searchInformationDataType = '';
  protected $spellingType = SearchSpelling::class;
  protected $spellingDataType = '';
  protected $urlType = SearchUrl::class;
  protected $urlDataType = '';

  public function setContext($context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param Result[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Result[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Promotion[]
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return Promotion[]
   */
  public function getPromotions()
  {
    return $this->promotions;
  }
  /**
   * @param SearchQueries
   */
  public function setQueries(SearchQueries $queries)
  {
    $this->queries = $queries;
  }
  /**
   * @return SearchQueries
   */
  public function getQueries()
  {
    return $this->queries;
  }
  /**
   * @param SearchSearchInformation
   */
  public function setSearchInformation(SearchSearchInformation $searchInformation)
  {
    $this->searchInformation = $searchInformation;
  }
  /**
   * @return SearchSearchInformation
   */
  public function getSearchInformation()
  {
    return $this->searchInformation;
  }
  /**
   * @param SearchSpelling
   */
  public function setSpelling(SearchSpelling $spelling)
  {
    $this->spelling = $spelling;
  }
  /**
   * @return SearchSpelling
   */
  public function getSpelling()
  {
    return $this->spelling;
  }
  /**
   * @param SearchUrl
   */
  public function setUrl(SearchUrl $url)
  {
    $this->url = $url;
  }
  /**
   * @return SearchUrl
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Search::class, 'Google_Service_CustomSearchAPI_Search');
