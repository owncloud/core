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

class Google_Service_CommentAnalyzer_ArticleAndParentComment extends Google_Model
{
  protected $articleType = 'Google_Service_CommentAnalyzer_TextEntry';
  protected $articleDataType = '';
  protected $parentCommentType = 'Google_Service_CommentAnalyzer_TextEntry';
  protected $parentCommentDataType = '';

  /**
   * @param Google_Service_CommentAnalyzer_TextEntry
   */
  public function setArticle(Google_Service_CommentAnalyzer_TextEntry $article)
  {
    $this->article = $article;
  }
  /**
   * @return Google_Service_CommentAnalyzer_TextEntry
   */
  public function getArticle()
  {
    return $this->article;
  }
  /**
   * @param Google_Service_CommentAnalyzer_TextEntry
   */
  public function setParentComment(Google_Service_CommentAnalyzer_TextEntry $parentComment)
  {
    $this->parentComment = $parentComment;
  }
  /**
   * @return Google_Service_CommentAnalyzer_TextEntry
   */
  public function getParentComment()
  {
    return $this->parentComment;
  }
}
