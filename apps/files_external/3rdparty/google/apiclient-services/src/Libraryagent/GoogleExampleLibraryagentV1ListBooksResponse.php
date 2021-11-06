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

namespace Google\Service\Libraryagent;

class GoogleExampleLibraryagentV1ListBooksResponse extends \Google\Collection
{
  protected $collection_key = 'books';
  protected $booksType = GoogleExampleLibraryagentV1Book::class;
  protected $booksDataType = 'array';
  public $nextPageToken;

  /**
   * @param GoogleExampleLibraryagentV1Book[]
   */
  public function setBooks($books)
  {
    $this->books = $books;
  }
  /**
   * @return GoogleExampleLibraryagentV1Book[]
   */
  public function getBooks()
  {
    return $this->books;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleExampleLibraryagentV1ListBooksResponse::class, 'Google_Service_Libraryagent_GoogleExampleLibraryagentV1ListBooksResponse');
