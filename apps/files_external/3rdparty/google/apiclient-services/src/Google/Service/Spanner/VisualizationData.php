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

class Google_Service_Spanner_VisualizationData extends Google_Collection
{
  protected $collection_key = 'prefixNodes';
  public $dataSourceEndToken;
  public $dataSourceSeparatorToken;
  protected $diagnosticMessagesType = 'Google_Service_Spanner_DiagnosticMessage';
  protected $diagnosticMessagesDataType = 'array';
  public $endKeyStrings;
  public $hasPii;
  public $indexedKeys;
  public $keySeparator;
  public $keyUnit;
  protected $metricsType = 'Google_Service_Spanner_Metric';
  protected $metricsDataType = 'array';
  protected $prefixNodesType = 'Google_Service_Spanner_PrefixNode';
  protected $prefixNodesDataType = 'array';

  public function setDataSourceEndToken($dataSourceEndToken)
  {
    $this->dataSourceEndToken = $dataSourceEndToken;
  }
  public function getDataSourceEndToken()
  {
    return $this->dataSourceEndToken;
  }
  public function setDataSourceSeparatorToken($dataSourceSeparatorToken)
  {
    $this->dataSourceSeparatorToken = $dataSourceSeparatorToken;
  }
  public function getDataSourceSeparatorToken()
  {
    return $this->dataSourceSeparatorToken;
  }
  /**
   * @param Google_Service_Spanner_DiagnosticMessage[]
   */
  public function setDiagnosticMessages($diagnosticMessages)
  {
    $this->diagnosticMessages = $diagnosticMessages;
  }
  /**
   * @return Google_Service_Spanner_DiagnosticMessage[]
   */
  public function getDiagnosticMessages()
  {
    return $this->diagnosticMessages;
  }
  public function setEndKeyStrings($endKeyStrings)
  {
    $this->endKeyStrings = $endKeyStrings;
  }
  public function getEndKeyStrings()
  {
    return $this->endKeyStrings;
  }
  public function setHasPii($hasPii)
  {
    $this->hasPii = $hasPii;
  }
  public function getHasPii()
  {
    return $this->hasPii;
  }
  public function setIndexedKeys($indexedKeys)
  {
    $this->indexedKeys = $indexedKeys;
  }
  public function getIndexedKeys()
  {
    return $this->indexedKeys;
  }
  public function setKeySeparator($keySeparator)
  {
    $this->keySeparator = $keySeparator;
  }
  public function getKeySeparator()
  {
    return $this->keySeparator;
  }
  public function setKeyUnit($keyUnit)
  {
    $this->keyUnit = $keyUnit;
  }
  public function getKeyUnit()
  {
    return $this->keyUnit;
  }
  /**
   * @param Google_Service_Spanner_Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_Spanner_Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_Spanner_PrefixNode[]
   */
  public function setPrefixNodes($prefixNodes)
  {
    $this->prefixNodes = $prefixNodes;
  }
  /**
   * @return Google_Service_Spanner_PrefixNode[]
   */
  public function getPrefixNodes()
  {
    return $this->prefixNodes;
  }
}
