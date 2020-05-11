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

class Google_Service_AccessContextManager_CustomLevel extends Google_Model
{
  protected $exprType = 'Google_Service_AccessContextManager_Expr';
  protected $exprDataType = '';

  /**
   * @param Google_Service_AccessContextManager_Expr
   */
  public function setExpr(Google_Service_AccessContextManager_Expr $expr)
  {
    $this->expr = $expr;
  }
  /**
   * @return Google_Service_AccessContextManager_Expr
   */
  public function getExpr()
  {
    return $this->expr;
  }
}
