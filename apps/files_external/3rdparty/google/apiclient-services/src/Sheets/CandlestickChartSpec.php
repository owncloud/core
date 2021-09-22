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

namespace Google\Service\Sheets;

class CandlestickChartSpec extends \Google\Collection
{
  protected $collection_key = 'data';
  protected $dataType = CandlestickData::class;
  protected $dataDataType = 'array';
  protected $domainType = CandlestickDomain::class;
  protected $domainDataType = '';

  /**
   * @param CandlestickData[]
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return CandlestickData[]
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param CandlestickDomain
   */
  public function setDomain(CandlestickDomain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return CandlestickDomain
   */
  public function getDomain()
  {
    return $this->domain;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CandlestickChartSpec::class, 'Google_Service_Sheets_CandlestickChartSpec');
