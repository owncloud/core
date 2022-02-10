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

namespace Google\Service\Spanner;

class VisualizationData extends \Google\Collection
{
  protected $collection_key = 'prefixNodes';
  /**
   * @var string
   */
  public $dataSourceEndToken;
  /**
   * @var string
   */
  public $dataSourceSeparatorToken;
  protected $diagnosticMessagesType = DiagnosticMessage::class;
  protected $diagnosticMessagesDataType = 'array';
  /**
   * @var string[]
   */
  public $endKeyStrings;
  /**
   * @var bool
   */
  public $hasPii;
  /**
   * @var string[]
   */
  public $indexedKeys;
  /**
   * @var string
   */
  public $keySeparator;
  /**
   * @var string
   */
  public $keyUnit;
  protected $metricsType = Metric::class;
  protected $metricsDataType = 'array';
  protected $prefixNodesType = PrefixNode::class;
  protected $prefixNodesDataType = 'array';

  /**
   * @param string
   */
  public function setDataSourceEndToken($dataSourceEndToken)
  {
    $this->dataSourceEndToken = $dataSourceEndToken;
  }
  /**
   * @return string
   */
  public function getDataSourceEndToken()
  {
    return $this->dataSourceEndToken;
  }
  /**
   * @param string
   */
  public function setDataSourceSeparatorToken($dataSourceSeparatorToken)
  {
    $this->dataSourceSeparatorToken = $dataSourceSeparatorToken;
  }
  /**
   * @return string
   */
  public function getDataSourceSeparatorToken()
  {
    return $this->dataSourceSeparatorToken;
  }
  /**
   * @param DiagnosticMessage[]
   */
  public function setDiagnosticMessages($diagnosticMessages)
  {
    $this->diagnosticMessages = $diagnosticMessages;
  }
  /**
   * @return DiagnosticMessage[]
   */
  public function getDiagnosticMessages()
  {
    return $this->diagnosticMessages;
  }
  /**
   * @param string[]
   */
  public function setEndKeyStrings($endKeyStrings)
  {
    $this->endKeyStrings = $endKeyStrings;
  }
  /**
   * @return string[]
   */
  public function getEndKeyStrings()
  {
    return $this->endKeyStrings;
  }
  /**
   * @param bool
   */
  public function setHasPii($hasPii)
  {
    $this->hasPii = $hasPii;
  }
  /**
   * @return bool
   */
  public function getHasPii()
  {
    return $this->hasPii;
  }
  /**
   * @param string[]
   */
  public function setIndexedKeys($indexedKeys)
  {
    $this->indexedKeys = $indexedKeys;
  }
  /**
   * @return string[]
   */
  public function getIndexedKeys()
  {
    return $this->indexedKeys;
  }
  /**
   * @param string
   */
  public function setKeySeparator($keySeparator)
  {
    $this->keySeparator = $keySeparator;
  }
  /**
   * @return string
   */
  public function getKeySeparator()
  {
    return $this->keySeparator;
  }
  /**
   * @param string
   */
  public function setKeyUnit($keyUnit)
  {
    $this->keyUnit = $keyUnit;
  }
  /**
   * @return string
   */
  public function getKeyUnit()
  {
    return $this->keyUnit;
  }
  /**
   * @param Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param PrefixNode[]
   */
  public function setPrefixNodes($prefixNodes)
  {
    $this->prefixNodes = $prefixNodes;
  }
  /**
   * @return PrefixNode[]
   */
  public function getPrefixNodes()
  {
    return $this->prefixNodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VisualizationData::class, 'Google_Service_Spanner_VisualizationData');
